<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
//        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
//        $this->middleware('permission:role-create', ['only' => ['create','store']]);
//        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('backend.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('backend.roles.modal_create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name'
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        if($role) {

            return response()->json([
                'success' => true,
                'message' => 'Data Role sukses disimpan',
                'data'    => $role
            ], 201);
        }
        else {

            return response()->json([
                'success' => false,
                'message' => 'Data Role gagal disimpan',
            ], 409);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->orderBy('name')
            ->get();

        return view('backend.roles.modal_show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::orderBy('name')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('backend.roles.modal_edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        if($role) {

            return response()->json([
                'success' => true,
                'message' => 'Data Role sukses di update',
                'data'    => $role
            ], 200);
        }
        else {

            return response()->json([
                'success' => false,
                'message' => 'Data Role tidak ditemukan',
            ], 404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_name = DB::table("roles")->where('id', $id)->first()->name;

        if(User::role($role_name)->get()->isEmpty()) {

            DB::table("roles")->where('id', $id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data User berhasil dihapus',
            ], 200);
        }
        else {

            return response()->json([
                'success' => false,
                'message' => 'Data Role sedang digunakan',
            ], 404);
        }
    }


    // ------------------------------------------------------------------------------
    //      ::  G E T   D A T A  ::
    // ------------------------------------------------------------------------------
    public function getData()
    {
        $data = Role::get();

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('name', function($data) {
                return '<a href="'.route('roles.show', $data->id).'" data-toggle="modal" data-target="#showModal"><strong>'.strtoupper($data->name).'</strong></a>';
            })

            ->addColumn('jml_user', function($data) {
                return $data->users->count();
            })

            ->editColumn('updated_at', function($data) {
                return $data->updated_at->format('d M Y');
            })

            ->addColumn('action', function($data) {

                $user = Auth::user();

                $actions = '<div class="btn-group btn-group-toggle" data-toggle="buttons">';

                $actions .= 1 ? '<a href="'.route("roles.show", $data->id).'" data-toggle="modal" data-target="#showModal" class="btn btn-sm btn-warning"><i class="fas fa-search"></i></a>' : '';
                $actions .= 1 ? '<a href="'.route('roles.edit', $data->id).'" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>' : '';
                $actions .= 1 ? '<a href="'.route('roles.confirm-delete', $data->id).'" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i></a>' : '';

                $actions .= '</div>';

                return $actions;
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }


    // -----------------------------------------------------------------------------------------------------------------
    //    ::  S H O W   M O D A L   D E L E T E   ::
    // -----------------------------------------------------------------------------------------------------------------
    public function getModalDelete($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->orderBy('name')
            ->get();

        return view('backend.roles.modal_delete',compact('role','rolePermissions'));
    }
}
