<?php

namespace App\Http\Controllers\Dashboard\Role1;

use App\Models\Permission;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Validator;

class PermissionController extends Controller
{

    function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bc'] = array(['link'=>route('dashboard'),'page'=>'Dashboard'],['link' => '#', 'page' => 'Permissions']);

         return view('dashboard.roles.permissions.index',$data);
    }
    public function getJsonPermissions(){
        $perms=Permission::all();
        return DataTables::of($perms)
               ->addIndexColumn()
                ->addColumn('action',function ($p){
                   $edit_link=link_to(route('permissions.edit',$p->id),'<i class="fa fa-edit" aria-hidden="true"></i>');
                    return html_entity_decode($edit_link);
                })
                ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['bc'] = array(['link'=>route('dashboard'),'page'=>'Dashboard'],['link' => '#', 'page' => 'Create Permissions']);

        return view('dashboard.roles.permissions.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input=$request->all();
       $validator=Validator::make($input,[
          'name'=>'required',
       ]);

       if ($validator->fails()){
           return back()->withInput()->with('errors',$validator->errors());
       }
       $data['name']=$input['name'];
       Permission::firstOrCreate($data);
       return back()->with('message','Module Permission Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
