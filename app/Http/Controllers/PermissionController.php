<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
         $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id','DESC')->paginate(5);
        return view('backend.permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('backend.permissions.modal_create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required',
        ]);

        $permission = Permission::create([
            'name' => $request->input('name'),
            'guard_name' => $request->input('guard_name'),
        ]);

        if($permission) {

            return response()->json([
                'success' => true,
                'message' => 'Data Permission sukses disimpan',
                'data'    => $permission
            ], 201);
        }
        else {

            return response()->json([
                'success' => false,
                'message' => 'Data Permission gagal disimpan',
            ], 409);
        }
    }

    // ------------------------------------------------------------------------------
    //      ::  G E T   D A T A  ::
    // ------------------------------------------------------------------------------
    public function getData()
    {
        $data = Permission::get();

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('name', function($data) {
                return '<a href="'.route('permissions.show', $data->id).'" data-toggle="modal" data-target="#showModal"><strong>'.strtoupper($data->name).'</strong></a>';
            })

            ->addColumn('guard_name', function($data) {
                return $data->guard_name;
            })

            ->addColumn('action', function($data) {
                return $data->action;
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    //    ::  S H O W   M O D A L   D E L E T E   ::
    // -----------------------------------------------------------------------------------------------------------------
    public function getModalDelete($id)
    {
        $permission = Permission::find($id);
        $permissionRoles = Role::join("role_has_permissions","role_has_permissions.role_id","=","roles.id")
            ->where("role_has_permissions.permission_id",$id)
            ->orderBy('name')
            ->get();

        return view('permissions.modal_delete',compact('permission','permissionRoles'));
    }
}
