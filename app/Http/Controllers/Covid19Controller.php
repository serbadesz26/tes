<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Covid19Request;
use App\Http\Requests\KontenRequest;
use App\Models\Covid19;
use App\Models\Konten;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class Covid19Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:covid19-list|covid19-create|covid19-edit|covid19-delete', ['only' => ['index','store']]);
        $this->middleware('permission:covid19-create', ['only' => ['create','store']]);
        $this->middleware('permission:covid19-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:covid19-delete', ['only' => ['destroy']]);
    }

    // ------------------------------------------------------------------------------
    //      ::  I N D E X ::
    // ------------------------------------------------------------------------------
    public function index()
    {
        return view('backend.covid19.index');
    }

    // ------------------------------------------------------------------------------
    //      ::  C R E A T E  ::
    // ------------------------------------------------------------------------------
    public function create()
    {
        $data = Covid19::latest('tgl_data')->first();
        return view('backend.covid19.create', ['data_prev_covid19' => $data]);
    }

    // ------------------------------------------------------------------------------
    //      ::  S T O R E  ::
    // ------------------------------------------------------------------------------
    public function store(Request $request)
    {
        $input = $request->all();

        $covid19 = Covid19::create($input);

        if($covid19) {
            return redirect('/backend/covid19')->with('status', 'Create Data Covid 19 Sukses !');
        }
        else {
            return redirect('/backend/covid19')->with('error', 'Create Data Covid 19 Gagal !');
        }
    }

    // ------------------------------------------------------------------------------
    //      ::  E D I T  ::
    // ------------------------------------------------------------------------------
    public function edit(Covid19 $covid19)
    {
        return view('backend.covid19.edit', ['covid19' => $covid19]);
    }

    // ------------------------------------------------------------------------------
    //      ::  U P D A T E  ::
    // ------------------------------------------------------------------------------
    public function update(Covid19Request $request, Covid19 $covid19)
    {
        $input = $request->all();

        $covid19->update($input);

        return redirect('/backend/covid19')->with('status', 'Covid 19 updated sukses!');
    }

    // -----------------------------------------------------------------------------------------------------------------
    //    ::  S H O W   M O D A L   D E L E T E   ::
    // -----------------------------------------------------------------------------------------------------------------
    public function getModalDelete($id)
    {
        $covid19 = Covid19::findOrFail($id);

        return view('backend.covid19.modal_delete',[
            'covid19' => $covid19
        ]);
    }

    // ------------------------------------------------------------------------------
    //      ::  D E S T R O Y  ::
    // ------------------------------------------------------------------------------
    public function destroy(Covid19 $covid19)
    {
        $covid19->delete();

        if($covid19) {
            return response()->json([
                'success' => true,
                'message' => 'Data Covid19 berhasil dihapus',
            ], 200);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Data Covid19 tidak ditemukan',
            ], 404);
        }
    }

    // ------------------------------------------------------------------------------
    //      ::  G E T   D A T A  ::
    // ------------------------------------------------------------------------------
    public function getData()
    {
        $data = Covid19::get();

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('tgl_data', function($data) {
                return $data->tgl_data->format('d M Y');
            })
            ->editColumn('created_at', function($data) {
                return $data->created_at->format('d M Y');
            })

            ->addColumn('action', function($data) {
                return $data->action;
            })
            ->rawColumns(['judul', 'action'])
            ->make(true);
    }
}
