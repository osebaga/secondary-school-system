<?php

namespace App\Http\Controllers\Dashboard\Settings;


use App\Models\Department;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\Campus;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use Validator;
use View;
use SRS;
class DepartmentController extends Controller
{
    protected $faculty_model,$dep_model;
    protected $srs;
    function __construct()
    {
        $this->dep_model=new Repository(new Department());
        $this->faculty_model=new Repository(new Faculty());

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('departments-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Departments']);
        $data['srs']= $this->srs;
        $data['institutions'] = Institution::with('campuses')->get();
        // $data['campuses'] = Campus::with('faculties')->get();
        $data['faculties']=Faculty::with('departments')->get();

        return view('dashboard.settings.departments.index', $data);
    }
    
    public function getJsonDepartments(){
        //$departments = $this->dep_model->all();
        $departments = Department::with('faculty');
                $departments = Department::with('faculty');

        //dd($departments);
        return DataTables::of($departments)
            ->editColumn('faculty_id',function ($dept){
               // $department=$this->faculty_model->find($dep->faculty_id);
               // dd($dept->faculty->faculty_name);
                return $dept->faculty != null ? $dept->faculty->faculty_name .'('.$dept->faculty->faculty_acronym.')':'-';
            })
            ->addColumn('action', function ($d) {
                $edit_link="";
                $delete_link ="";
                if(Gate::allows('departments-edit')){
                $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-dept-edit-button" data-url="' . route('departments.edit', SRS::encode($d->id)) . '"');
                }
                if(Gate::allows('departments-delete')){
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $d->department_name) . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('departments.destroy', SRS::encode($d->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <a href='#' class='btn po-close btn-primary'>" . trans('app.no') . "</a>\"  rel='popover'><i class=\"fa fa fa-trash-o pl-2 red\"></i> "
                    . "</a>";
                }
                $action = html_entity_decode($edit_link) . html_entity_decode($delete_link);
                return $action;
            })->escapeColumns('action')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('departments-create')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);
        $insts=Institution::all();
        $institutions['']='';
        foreach ($insts as $inst){
            $institutions[$inst->id]=$inst->institution_name;
        }

        $camps=Campus::all();
        $campuses['']='';
        foreach ($camps as $camp){
            $campuses[$camp->id]=$camp->campus_name;
        }

        $facs=Faculty::all();
        $faculties['']='';
        foreach ($facs as $faculty){
            $faculties[$faculty->id]=$faculty->faculty_name;
        }

        $data['institutions']=$institutions;
        $data['campuses']=$campuses;
        // $data['faculties']=$faculties;
        return View::make('dashboard.settings.departments.modals.modal_body_create',$data)->render();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('departments-create')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'institution_id' => 'required',
            'campus_id'=>'required',
            // 'faculty_id' => 'required',
            'department_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        $this->dep_model->create($input);
        return back()->with('message', 'Department Successfully Added');

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
        if (! Gate::allows('departments-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }

        $department = Department::find($id);
        $faculty = $department->faculty;
        $campus = $faculty->campus;
        $institution = $campus->institution;
        $camps = $institution->campuses;
        $facs = $campus->faculties;
        $faculties['']='';
        foreach ($facs as $faculty) {
            $faculties[$faculty->id] = $faculty->faculty_name;
        }
        $campuses['']='';
        foreach ($camps as $campus) {
            $campuses[$campus->id] = $campus->campus_name;
        }
        $insts=Institution::all();
        $institutions['']='';
        foreach ($insts as $inst){
            $institutions[$inst->id]=$inst->institution_name;
        }
        $data['department']= $department;
        $data['faculties']=$faculties;
        $data['institutions']=$institutions;
        $data['campuses']=$campuses;

        return View::make('dashboard.settings.departments.modals.modal_body_edit', $data)->render();

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
        if (! Gate::allows('departments-edit')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'institution_id' => 'required',
            'campus_id' => 'required',
            'faculty_id' => 'required',
            'department_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        $this->dep_model->update($input,$id);
        return back()->with('message', 'Department Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('departments-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $dept = Department::find($id);

        if (!$dept) {
            return response()->json('Department   Not Found');
        }

        if ($dept->delete()) {
            return response()->json("Department (" . $id . ')   has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }
}
