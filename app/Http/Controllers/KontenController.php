<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\KontenRequest;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use function PHPUnit\Framework\isEmpty;

class KontenController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:konten-list|konten-create|konten-edit|konten-delete', ['only' => ['index','store']]);
        $this->middleware('permission:konten-create', ['only' => ['create','store']]);
        $this->middleware('permission:konten-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:konten-delete', ['only' => ['destroy']]);
    }

    // ------------------------------------------------------------------------------
    //      ::  I N D E X ::
    // ------------------------------------------------------------------------------
    public function index()
    {
        return view('backend.konten.index');
    }

    // ------------------------------------------------------------------------------
    //      ::  C R E A T E  ::
    // ------------------------------------------------------------------------------
    public function create()
    {
        return view('backend.konten.create');
    }

    // ------------------------------------------------------------------------------
    //      ::  S T O R E  ::
    // ------------------------------------------------------------------------------
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'kategori_id' => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($input['judul'], '-');

        //upload Image
        if ($request->hasFile('image')) {
            $input['image'] = Helper::uploadfile($request->file('image'), 'konten', 'konten');
        }

        $konten = Konten::create($input);

        if($konten) {
            return redirect('/backend/konten')->with('status', 'Create Konten Sukses !');
        }
        else {
            return redirect('/backend/konten')->with('error', 'Create Konten Gagal !');
        }
    }

    // ------------------------------------------------------------------------------
    //      ::  E D I T  ::
    // ------------------------------------------------------------------------------
    public function edit(Konten $konten)
    {
        return view('backend.konten.edit', ['konten' => $konten]);
    }

    // ------------------------------------------------------------------------------
    //      ::  U P D A T E  ::
    // ------------------------------------------------------------------------------
    public function update(KontenRequest $request, Konten $konten)
    {
        $input = $request->all();

        $input['slug'] = Str::slug($input['judul'], '-');

        // UPDATE FOTO
        if ($request->has('hapusimage')) {

            Helper::hapusfile('public/konten/'.$konten->image);
            $input['image'] = '';
        }
        else {
            if ($request->hasFile('image')) {

                Helper::hapusfile('public/konten/'.$konten->image);
                $input['image'] = Helper::uploadfile($request->file('image'), 'konten', 'konten');
            }
        }

        $konten->update($input);

        return redirect('/backend/konten')->with('status', 'Konten updated sukses!');
    }

    // ------------------------------------------------------------------------------
    //      ::  S H O W  ::
    // ------------------------------------------------------------------------------
    public function show(Konten $konten)
    {
        return view('backend.konten.show', ['konten' => $konten]);
    }

    // ------------------------------------------------------------------------------
    //      ::  G E T   D A T A  ::
    // ------------------------------------------------------------------------------
    public function getData()
    {
        $data = Konten::get();

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('judul', function($data) {
                return '<a href="'.route('konten.show', $data->id).'"><strong>'.$data->judul.'</strong></a>';
            })

            ->editColumn('slug', function($data) {
                return $data->slug;
            })

            ->editColumn('kategori', function($data) {
                return Helper::listKategoriKonten($data->kategori_id);
            })

            ->addColumn('sub_konten', function($data) {
                return $data->sub_konten->count();
            })

            ->editColumn('created', function($data) {
                return $data->created_at->format('d M Y');
            })

            ->addColumn('action', function($data) {
                return $data->action;
            })
            ->rawColumns(['judul', 'action'])
            ->make(true);
    }

    // ------------------------------------------------------------------------------
    //      ::  K O N T E N - P R O F I L  ::
    // ------------------------------------------------------------------------------
    public function kontenProfil($slug)
    {
        $data_konten = Konten::where('slug', $slug)->first();

        $img_thumb = ($data_konten['image'] != '') ? asset('konten/'.$data_konten['image']) : asset('images/website/img_profil.png');

        // Meta Tags
        Helper::setMeta(
            'profil',
            URL::to('/').'/profil'.$data_konten['slug'],
            'Profil',
            $data_konten['judul'],
            Str::limit(strip_tags($data_konten['konten'], 160)),
            $img_thumb
        );

        return view('content.profil.show',[
            'data_konten' => $data_konten,
            'img_thumb' => $img_thumb
        ]);
    }

    // ------------------------------------------------------------------------------
    //      ::  K O N T E N - P O T E N S I  ::
    // ------------------------------------------------------------------------------
    public function kontenPotensi($slug)
    {
        $data_konten = Konten::where('slug', $slug)->first();

        $img_thumb = ($data_konten['image'] != '') ? asset('konten/'.$data_konten['image']) : asset('images/website/img_potensi.png');

        // Meta Tags
        Helper::setMeta(
            'potensi',
            URL::to('/').'/potensi'.$data_konten['slug'],
            'Potensi',
            $data_konten['judul'],
            Str::limit(strip_tags($data_konten['konten'], 160)),
            $img_thumb
        );

        return view('content.potensi.show',[
            'data_konten' => $data_konten,
            'img_thumb' => $img_thumb
        ]);
    }

    // ------------------------------------------------------------------------------
    //      ::  K O N T E N - P P I D  ::
    // ------------------------------------------------------------------------------
    public function kontenPpid($slug)
    {
        $data_konten = Konten::where('slug', $slug)->first();

        $img_thumb = ($data_konten['image'] != '') ? asset('konten/'.$data_konten['image']) : asset('images/website/img_ppid.png');

        // Meta Tags
        Helper::setMeta(
            'ppid',
            URL::to('/').'/ppid'.$data_konten['slug'],
            'Informasi',
            $data_konten['judul'],
            Str::limit(strip_tags($data_konten['konten'], 160)),
            $img_thumb
        );

        return view('content.ppid.show',[
            'data_konten' => $data_konten,
            'img_thumb' => $img_thumb
        ]);
    }
}
