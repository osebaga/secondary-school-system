<?php

namespace App\Http\Controllers\Dashboard\Role1;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;
use SRS;
class RoleController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:role-list', ['only' => ['index', 'show']]);
//        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        //$this->srs = new Srs();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];


       // $data['srs']=$this->srs;
        $data['roles'] = Role::orderBy('id','DESC')->paginate(5);
        return view('dashboard.roles.index',$data)
            ->with('i', ($request->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Create Roles']];
        $data['permission'] = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")

            ->get();
       // $data['srs'] = $this->srs;
        $data['role_permission'] = Permission::get();
        return view('dashboard.roles.create', $data);
    }

    public function getRoles()
    {
        try {
            $roles = Role::query();
            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('action', function ($roles) {
                    return '<div style="display: inline">
                             <a href="' . route('roles.show', SRS::encode($roles->id)) . '" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Show</a>
                             <a href="' . route('roles.edit', SRS::encode($roles->id)) . '" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                             <a href="javascript(0);" data-toggle="modal" onclick="deleteData(' . $roles->id . ')" data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            </div>';
                })
                ->make(true);
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);
        } catch (ValidationException $e) {

        }
        $input = $request->all();
        $check_box = $request->get('permission');
        $role = Role::create(['name' => $request->input('name')]);
        foreach ($check_box as $item => $key) {
            $role->syncPermissions($request->get('permission'));
        }
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'View Roles']];
        $id = SRS::decode($id)[0];

        $role = Role::find($id);
        //dd($role->id);
        $permission = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();


        $data['role'] = $role;
        $data['permission'] = $permission;
        $data['role_permission'] = $rolePermissions;
        return view('dashboard.roles.show1', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Roles']];
        $id = SRS::decode($id)[0];
        $role = Role::find($id);
        $permission = Permission::get();
//        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
//            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
//            ->all();
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();


        $data['role'] = $role;
        $data['permission'] = $permission;
        $data['role_permission'] = $rolePermissions;
        return view('dashboard.roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = SRS::decode($id)[0];

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        //dd($request->all(),$request->input('permission'));

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));

        return back()->with('message','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Role::find($id)->delete();
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('success', 'Role deleted successfully.');
    }
}
