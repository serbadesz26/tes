<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    // ------------------------------------------------------------------------------
    //      ::  I N D E X  ::
    // ------------------------------------------------------------------------------
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('backend.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    // ------------------------------------------------------------------------------
    //      ::  C R E A T E  ::
    // ------------------------------------------------------------------------------
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.modal_create',compact('roles'));
    }

    // ------------------------------------------------------------------------------
    //      ::  S T O R E  ::
    // ------------------------------------------------------------------------------
    public function store(UserRequest $request)
    {
        $input = $request->all();

        // Enkripsi password
        $input['password'] = Hash::make($input['password']);

        //upload foto
        if ($request->hasFile('foto')) {
            $input['foto'] = Helper::uploadfoto($request->file('foto'), 'foto', 'foto_user');
        }

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        if($user) {

            return response()->json([
                'success' => true,
                'message' => 'Data User sukses disimpan',
                'data'    => $user
            ], 201);
        }
        else {

            return response()->json([
                'success' => false,
                'message' => 'Data User gagal disimpan',
            ], 409);
        }
    }

    // ------------------------------------------------------------------------------
    //      ::  S H O W  ::
    // ------------------------------------------------------------------------------
    public function show(User $user)
    {
        return view('backend.users.modal_show',['user' => $user]);
    }

    // ------------------------------------------------------------------------------
    //      ::  E D I T ::
    // ------------------------------------------------------------------------------
    public function edit($id)
    {
        $user = User::findOrfail($id);

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('backend.users.modal_edit',compact(['user','roles','userRole']));
    }

    // ------------------------------------------------------------------------------
    //      ::  U P D A T E ::
    // ------------------------------------------------------------------------------
    public function update(UserRequest $request, $id)
    {
        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }

        $user = User::findOrfail($id);

        // UPDATE FOTO
        if ($request->has('hapusfoto')) {

            hapusfoto('public/foto_user/'.$user->foto);
            $input['foto'] = '';
        }
        else {
            if ($request->hasFile('foto')) {

                hapusfoto('public/foto_user/'.$user->foto);
                $input['foto'] = uploadfoto($request->file('foto'), 'foto', 'foto_user');
            }
        }

        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        if($user) {

            return response()->json([
                'success' => true,
                'message' => 'Data User sukses di update',
                'data'    => $user
            ], 200);
        }
        else {

            return response()->json([
                'success' => false,
                'message' => 'Data User tidak ditemukan',
            ], 404);
        }
    }

    // ------------------------------------------------------------------------------
    //      ::  D E S T R O Y  ::
    // ------------------------------------------------------------------------------
    public function destroy($id)
    {
        $user = User::findOrfail($id);

        hapusfoto('public/foto_user/'.$user->foto);

        if($user) {

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data User berhasil dihapus',
            ], 200);
        }
        else {

            return response()->json([
                'success' => false,
                'message' => 'Data User tidak ditemukan',
            ], 404);
        }

    }

    // ------------------------------------------------------------------------------
    //      ::  G E T   D A T A  ::
    // ------------------------------------------------------------------------------
    public function getData()
    {
        $data = User::get();

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('name', function($data) {
                return '<a href="'.route('users.show', $data->id).'" data-toggle="modal" data-target="#showModal"><strong>'.strtoupper($data->name).'</strong></a>';
            })

            ->editColumn('foto', function($data) {
                if(isset($data->foto) && ($data->foto != "")) {
                    return "<img src='".asset("foto_user/$data->foto")."' class=\"img-thumbnail\" width=\"80px\">";
                } else {
                    return "";
                }
            })

            ->addColumn('role', function($data) {
                return $data->role;
            })

            ->addColumn('status', function($data) {
                return $data->status;
            })

            ->editColumn('updated_at', function($data) {
                return $data->updated_at->format('d M Y, H:i');
            })

            ->addColumn('action', function($data) {
                return $data->action;
            })
            ->rawColumns(['name', 'foto','role', 'action'])
            ->make(true);
    }

    // -----------------------------------------------------------------------------------------------------------------
    //    ::  S H O W   M O D A L   D E L E T E   ::
    // -----------------------------------------------------------------------------------------------------------------
    public function getModalDelete($id)
    {
        $user = User::findOrFail($id);

        return view('backend.users.modal_delete',[
            'user' => $user
        ]);
    }

}
