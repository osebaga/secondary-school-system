<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\BaseController;


use App\Models\AcademicYear;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Program;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use Validator;
use SRS;

class ProgramController extends Controller
{
    protected $program_model, $dep_model, $faculty_model;
    protected $srs;

    function __construct()
    {

        $this->program_model = new Repository(new Program());
        $this->dep_model = new Repository(new Department());
        $this->faculty_model = new Repository(new Faculty());

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('programs-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Programmes > List Programmes']);

        return view('dashboard.settings.programs.index', $data);

    }

    public function getJsonPrograms()
    {
        if (! Gate::allows('programs-view')) {
            return abort(401);
        }
        // $programsx = Program::academicYear()->get();
        //dd(Auth::user()->staff->year_id);
        $programs = DB::table('programs as p')
            ->select('p.id AS p_id', 'p.*')
            ->get();

        //  dd($programs);

        return DataTables::of($programs)
            ->addIndexColumn()
            ->editColumn('program_name', function ($program) {
                return $program->program_name . '(' . $program->program_code . ')-(' . $program->program_acronym . ')';
            })

            ->addColumn('action', function ($program) {
                $edit_link ="";
                $delete_link ="";
                if (Gate::allows('programs-edit')) {
                    $edit_link = link_to(route('programs.edit', SRS::encode($program->p_id)), '<i class="fa fa-edit"></i>', 'class="sledit"');
                }
                if (Gate::allows('programs-delete')) {
                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Program") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('programs.destroy', SRS::encode($program->p_id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
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
     * @param $faculty_id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('programs-create')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard']);
      //  $id = SRS::decode($faculty_id)[0];


        $approval = ['' => '', 0 => 'No', 1 => 'Yes'];
        $program_types = [
            '' => '',
            'Certificate' => 'Certificate',
            'Diploma' => 'Diploma',
            'Bachelor' => 'Bachelor',


        ];
        $program_category = [
            '' => '',
            'Undergraduate' => 'Undergraduate',
            'Graduate' => 'Graduate'
        ];
        $program_duration = [
            '' => '',
            '1' => '1 Year',
            '2' => '2 Years',
            '3' => '3 Years',
            '4' => '4 Years',
            '5' => '5 Years',
        ];
        // dd($academic_years,$approval,$program_types,$program_category);

        // $data['academic_years'] = $academic_years;
        $data['approval'] = $approval;
        $data['program_types'] = $program_types;
        $data['program_category'] = $program_category;
        $data['program_duration'] = $program_duration;
        // $data['faculties'] = $faculties;

        return view('dashboard.settings.programs.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('programs-create')) {
            return abort(401);
        }
        $input = $request->all();
        // dd($input);
        $validator = Validator::make($input, [
            // 'faculty_id'=>'required',
            'program_code' => 'required',
            'program_acronym' => 'required',
            'program_type' => 'required',
            'program_category' => 'required',
            'program_duration' => 'required',
            // 'program_weight' => 'required',
            'is_approved' => 'required',
            // 'tuition_fee' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        //$this->program_model->create($input);
        $input['year_id'] = Auth::user()->staff->year_id;

       /// $id = SRS::decode($input['faculty_id'])[0];

       // $this->faculty_model->find($id)->programs()->create($input);
        Program::create($input);

        return back()->with('message', 'Program Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('programs-edit')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Programme']);

        $id = SRS::decode($id)[0];
        $data['program'] = $this->program_model->find($id);


        $facts = Faculty::all();
        $faculties['']    = [''];
        foreach ($facts  as  $f){
            $faculties[$f->id] =$f->faculty_name;
        }

        $ac_years = AcademicYear::all();
        $academic_years[''] = '';
        foreach ($ac_years as $ac_year) {
            $academic_years[$ac_year->id] = $ac_year->year;
        }

        $approval = ['' => '', 0 => 'No', 1 => 'Yes'];
        $program_types = [
            '' => '',
            'Certificate' => 'Certificate',
            'Diploma' => 'Diploma',
            'Bachelor' => 'Bachelor',
            'Masters' => 'Masters',
            'Phd' => 'Phd'

        ];
        $program_category = [
            '' => '',
            'Undergraduate' => 'Undergraduate',
            'Graduate' => 'Graduate'
        ];
        $program_duration = [
            '' => '',
            '1' => '1 Year',
            '2' => '2 Years',
            '3' => '3 Years',
            '4' => '4 Years',
            '5' => '5 Years',
        ];
        // dd($academic_years,$approval,$program_types,$program_category);
        $data['academic_years'] = $academic_years;
        $data['approval'] = $approval;
        $data['program_types'] = $program_types;
        $data['program_category'] = $program_category;
        $data['program_duration'] = $program_duration;
        $data['faculties'] = $faculties;

        return view('dashboard.settings.programs.edit', $data);

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
        if (! Gate::allows('programs-edit')) {
            return abort(401);
        }
        $input = $request->all();
        $id = SRS::decode($id)[0];
        $validator = Validator::make($input, [
            'faculty_id' => 'required',
            'year_id' => 'required',
            'program_code' => 'required',
            'program_acronym' => 'required',
            'program_type' => 'required',
            'program_category' => 'required',
            'program_duration' => 'required',
            'program_weight' => 'required',
            'is_approved' => 'required',
            'tuition_fee' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        $this->program_model->update($input, $id);
        return back()->with('message', 'College Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('programs-delete')) {
            return abort(401);
        }
        $id = SRS::decode($id)[0];
        $this->program_model->destroy($id);
        return response()->json('Program Deleted Successfully');
    }


}
