<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubKontenRequest;
use App\Models\Konten;
use App\Models\SubKonten;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubKontenController extends Controller
{
    // ------------------------------------------------------------------------------
    //      ::  I N D E X ::
    // ------------------------------------------------------------------------------
    public function index(Request $request)
    {
        $konten = Konten::findOrFail($request->konten_id);

        return view('backend.sub_konten.index', [
            'konten' => $konten
        ]);
    }

    // ------------------------------------------------------------------------------
    //      ::  G E T   D A T A  ::
    // ------------------------------------------------------------------------------
    public function getData(Request $request)
    {
        $data = SubKonten::KontenId($request->konten_id)->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('judul', function ($data) {
                return '<a href="#" data-toggle="modal" data-target="#showModal"><strong>' . strtoupper($data->judul) . '</strong></a>';
            })
            ->editColumn('konten', function ($data) {
                return Str::of($data->konten)->words(50, '...');
            })
            ->editColumn('status', function ($data) {
                return $data->status;
            })
            ->editColumn('created', function ($data) {
                return $data->updated_at->format('d M Y, H:i');
            })
            ->addColumn('action', function ($data) {
                return $data->action;
            })
            ->rawColumns(['judul', 'action'])
            ->make(true);
    }

    // ------------------------------------------------------------------------------
    //      ::  C R E A T E  ::
    // ------------------------------------------------------------------------------
    public function create()
    {
        return view('backend.sub_konten.modal_create');
    }

    // ------------------------------------------------------------------------------
    //      ::  S T O R E  ::
    // ------------------------------------------------------------------------------
    public function store(SubKontenRequest $request)
    {
        $input = $request->all();
        $sub_konten = SubKonten::create($input);

        if ($sub_konten) {
            return response()->json([
                'success' => true,
                'message' => 'Data Sub Konten sukses disimpan',
                'data' => $sub_konten
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Sub Konten gagal disimpan',
            ], 409);
        }
    }

    // ------------------------------------------------------------------------------
    //      ::  E D I T  ::
    // ------------------------------------------------------------------------------
    public function edit(SubKonten $sub_konten)
    {
        return view('backend.sub_konten.modal_edit',['sub_konten' => $sub_konten]);
    }

    // ------------------------------------------------------------------------------
    //      ::  U P D A T E  ::
    // ------------------------------------------------------------------------------
    public function update(SubKontenRequest $request, SubKonten $sub_konten)
    {
        $input = $request->all();

        $sub_konten->update($input);

        if($sub_konten) {
            return response()->json([
                'success' => true,
                'message' => 'Data Sub KOnten berhasil di update',
                'data'    => $sub_konten
            ], 200);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Data Sub Kontan tidak ditemukan',
            ], 404);
        }
    }

    // -----------------------------------------------------------------------------------------------------------------
    //    ::  S H O W   M O D A L   D E L E T E   ::
    // -----------------------------------------------------------------------------------------------------------------
    public function getModalDelete($id)
    {
        $sub_konten = SubKonten::findOrFail($id);

        return view('backend.sub_konten.modal_delete',[
            'sub_konten' => $sub_konten
        ]);
    }

    // ------------------------------------------------------------------------------
    //      ::  D E S T R O Y  ::
    // ------------------------------------------------------------------------------
    public function destroy($id)
    {
        $sub_konten = SubKonten::findOrfail($id);

        if($sub_konten) {

            $sub_konten->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data Sub Konten berhasil dihapus',
            ], 200);
        }
        else {

            return response()->json([
                'success' => false,
                'message' => 'Data Sub Konten tidak ditemukan',
            ], 404);
        }

    }
}
