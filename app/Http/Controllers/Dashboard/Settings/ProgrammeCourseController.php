<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Helpers\SRS as HelpersSRS;
use App\Http\Controllers\BaseController;


use App\Models\Faculty;
use App\Models\Program;
use App\Models\Campus;
use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\Department;


use App\Models\ProgramCourse;
use App\order_status;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use Validator;
use SRS;

class ProgrammeCourseController extends Controller
{
    protected $campus_model, $faculty_model, $program_model, $department_model;
    protected  $course_model;

    function __construct()
    {
        $this->campus_model = new Repository(new Campus());
        $this->faculty_model = new Repository(new Faculty());
        $this->program_model = new Repository(new Program());
        $this->department_model = new Repository(new Program());
        $this->course_model = new Repository(new Course());

    }

    public function index($program_id, $year_level)
    {
        if (! Gate::allows('programs-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Program Courses']);
        try {
            $pid = SRS::decode($program_id)[0];
            $year = SRS::decode($year_level)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        /*$program=$this->program_model->findWhere('id',$pid)->with(['courses'=>function($q) use($year){
            $q->where('year','=',$year);
        }])->first();*/
        // $program = Program::academicYear()->programId($pid)
        // ->with(['courses' => function ($q){
            // $q->where('year', '=', $year);
            // $q->academicYear();
            //$q->with('staffs');
        // }])->first();
        $program = Program::programId($pid)->with(['courses' => function ($q) use($year) {
        $q->where('year','=',$year);
        }])->first();
        //dd($program);
        $courses_sem1 = array();
        $courses_sem2 = array();
        $courses_sem3 = array();
        $courses_sem4 = array();
        if (!is_null($program)) {
            foreach ($program->courses as $course) {
                if ($course->pivot->semester == 1 ) {
                    $courses_sem1[] = $course;
                } elseif ($course->pivot->semester == 2) {
                    $courses_sem2[] = $course;
                } elseif ($course->pivot->semester == 3) {
                    $courses_sem3[] = $course;
                } elseif ($course->pivot->semester == 4) {
                    $courses_sem4[] = $course;
                }
            }
        }
        // dd($courses_sem1[0]->staffs[0]->user);
        // dd($courses);
        $data['program'] = $program;
        $data['yr'] = $year;

        $data['courses_sem1'] = $courses_sem1;
        $data['courses_sem2'] = $courses_sem2;
        $data['courses_sem3'] = $courses_sem3;
        $data['courses_sem4'] = $courses_sem4;
        
        return view('dashboard.settings.programs.program_courses.index', $data);
    }


    public function programModules()
    {

        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings / Programmes']);

        // $module_programs  = Faculty::with(['programs'=>function($q){
        //  //   $q->where('year_id', '=', Auth::user()->staff->year_id);
        // }])->get();


        $module_programs  = Program::all();

    //    dd($module_programs);


        $data['module_programs'] = $module_programs;
        return view('dashboard.settings.programs.program_courses.index_academic_program_faculty', $data);

    }

    public function program_shift_Schools()
    {

        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Program&Schools']);
        $campus_programs = $this->campus_model->with(['faculties.departments.programs' => function ($q) {
            $q->where('year_id', '=', $this->academic_year_id);

        }])->get();
        //dd($campus_programs);
        $data['campus_programs'] = $campus_programs;

        return view('dashboard.settings.programs.program_courses.index_academic_program_shift_schools', $data);
    }

    public function shiftPrograms($school_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Program&Schools']);
        $id = SRS::decode($school_id)[0];
        $faculty = $this->faculty_model->find($id);
        $bachelor_type = DB::table('programs')
            ->join('departments', function ($query) use ($id) {
                $query->on('departments.id', '=', 'programs.department_id');
                $query->where('departments.faculty_id', '=', $id);
            })
            ->join('academic_years', 'academic_years.id', '=', 'programs.year_id')
            ->where('programs.program_type', '=', 'Bachelor')
            ->where(function ($query) {
                $query->where('programs.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();

        $diploma_type = DB::table('programs')
            ->join('departments', function ($query) use ($id) {
                $query->on('departments.id', '=', 'programs.department_id');
                $query->where('departments.faculty_id', '=', $id);
            })
            ->join('academic_years', 'academic_years.id', '=', 'programs.year_id')
            ->where('programs.program_type', '=', 'Diploma')
            ->where(function ($query) {
                $query->where('programs.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();

        $certificate_type = DB::table('programs')
            ->join('departments', function ($query) use ($id) {
                $query->on('departments.id', '=', 'programs.department_id');
                $query->where('departments.faculty_id', '=', $id);
            })
            ->join('academic_years', 'academic_years.id', '=', 'programs.year_id')
            ->where('programs.program_type', '=', 'Certificate')
            ->where(function ($query) {
                $query->where('programs.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();
        $masters_type = DB::table('programs')
            ->join('departments', function ($query) use ($id) {
                $query->on('departments.id', '=', 'programs.department_id');
                $query->where('departments.faculty_id', '=', $id);
            })
            ->join('academic_years', 'academic_years.id', '=', 'programs.year_id')
            ->where('programs.program_type', '=', 'Masters')
            ->where(function ($query) {
                $query->where('programs.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();

        $postgraduate_type = DB::table('programs')
            ->join('departments', function ($query) use ($id) {
                $query->on('departments.id', '=', 'programs.department_id');
                $query->where('departments.faculty_id', '=', $id);
            })
            ->join('academic_years', 'academic_years.id', '=', 'programs.year_id')
            ->where('programs.program_type', '=', 'Postgraduate Diploma')
            ->where(function ($query) {
                $query->where('programs.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();


        $data['faculty'] = $faculty;
        $data['id'] = SRS::decode($school_id)[0];
        $data['bachelor_type'] = $bachelor_type;
        $data['diploma_type'] = $diploma_type;
        $data['certificate_type'] = $certificate_type;
        $data['masters_type'] = $masters_type;
        $data['postgraduate_type'] = $postgraduate_type;
        return view('dashboard.settings.programs.program_courses.index_shift_program', $data);

    }

    public function shift_program($programs, $school)
    {
        $id = SRS::decode($school)[0];
        $programme = DB::table('programs')
            ->join('departments', function ($query) use ($id) {
                $query->on('departments.id', '=', 'programs.department_id');
                $query->where('departments.faculty_id', '=', $id);
            })
            ->join('academic_years', 'academic_years.id', '=', 'programs.year_id')
            ->where('programs.program_type', '=', $programs)
            ->where(function ($query) {
                $query->where('programs.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();
//        dd($programme);
        try {
            foreach ($programme as $item) {

                $program_data = [

                    'program_name' => $item->program_name,
//                    'program_code' => $item->program_code,
                    'program_acronym' => $item->program_acronym,
                    'program_type' => $item->program_type,
                    'program_category' => $item->program_category,
                    'program_duration' => $item->program_duration,
                    'program_weight' => $item->program_weight,
                    'is_approved' => $item->is_approved,
                    'tuition_fee' => $item->tuition_fee,
                    'tag' => '',
                ];
                $where = [
                    'department_id' => $item->department_id,
                    'year_id' => Auth::user()->staff->year_id + 1,
                    'program_code' => $item->program_code,
                ];

                $program_status = program::firstOrcreate($where, $program_data);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }
        return back()->with('message', 'Programme Shifted Successfully !!!');
    }

    public function unshift_program($programs, $school)
    {
        $id = SRS::decode($school)[0];
        $programme = DB::table('programs')
            ->join('departments', function ($query) use ($id) {
                $query->on('departments.id', '=', 'programs.department_id');
                $query->where('departments.faculty_id', '=', $id);
            })
            ->join('academic_years', 'academic_years.id', '=', 'programs.year_id')
            ->where('programs.program_type', '=', $programs)
            ->where(function ($query) {
                $query->where('programs.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();
//        dd($programme);
        try {
            foreach ($programme as $item) {
                $program_data = [
                    'department_id' => $item->department_id,
                    'year_id' => Auth::user()->staff->year_id + 1,
                    'program_name' => $item->program_name,
                    'program_code' => $item->program_code,
                    'program_acronym' => $item->program_acronym,
                    'program_type' => $item->program_type,
                    'program_category' => $item->program_category,
                    'program_duration' => $item->program_duration,
                    'program_weight' => $item->program_weight,
                    'is_approved' => $item->is_approved,
                    'tuition_fee' => $item->tuition_fee,
                    'tag' => '',
                ];
                //$program_status = program::create($program_data);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }
        return back()->with('message', 'Programme Shifted Successfully !!!');
    }


    public function academicPrograms($school_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Program&Schools']);
        $id = SRS::decode($school_id)[0];
        $faculty = $this->faculty_model->find($id);


        $data['faculty'] = $faculty;
        $data['id'] = $school_id;
        return view('dashboard.settings.programs.program_courses.index_academic_program', $data);

    }

    public function getJsonAcademicPrograms($school_id)
    {
        $id = SRS::decode($school_id)[0];

        //$module_programs=$this->faculty_model->find($id)->programs()->where('year_id','=',$this->academic_year_id)->get();
        $module_programs = $this->faculty_model->find($id)->programs()->academicYear()->get();

        return DataTables::of($module_programs)
            ->addIndexColumn()
            ->addColumn('action', function ($p) {

                $edit_link = link_to(route('programs.edit', [SRS::encode($p->id)]), '<i class="fa fa-edit p-2" aria-hidden="true"></i>Edit');
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete program") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('programs.destroy', SRS::encode($p->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o p-2\"></i> "
                    . trans('Delete') . "</a>";

                $config_link = link_to(route('program-courses.program-config', SRS::encode($p->id)), '<i class="mdi mdi-settings  p-2" aria-hidden="true"></i>Configuration');
                return html_entity_decode($config_link) . html_entity_decode($edit_link) . html_entity_decode($delete_link);

            })
            ->make(true);
    }

    public function programConfiguration($program_id)
    {
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings / Modules Config']);

        $id = HelpersSRS::decode($program_id)[0];
        // $program = Program::where('id',$id)->with('faculty.campus')->first();
        $program = Program::where('id',$id)->first();

        //dd($program,$id);
        $data['program'] = $program;

        return view('dashboard.settings.programs.program_courses.program_config', $data);
    }

    public function create($program_id, $year_level)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Assign Course to A program']);
        try {
            $pid = HelpersSRS::decode($program_id)[0];
            $year = HelpersSRS::decode($year_level)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        // $program=$this->program_model->find($pid);
        // $program = Program::academicYear()->programId($pid)->first();
        $program = Program::find($pid)->first();

        $courses_all = Course::all();

        $data['program'] = $program;
        $data['program_id'] = $program_id;
        $data['yr'] = $year_level;

        $courses[''] = '';
        foreach ($courses_all as $course) {
            // $faculty = Department::find($course->department_id)->faculty;
                //dd($course);
            $courses[$course->id] = $course->course_name . '(' . $course->course_code . ')';
        }

        $data['course_options'] = [
            '' => '',
            '1' => 'Core',
            '0' => 'Option'
        ];

        $data['course_semester'] = [
            '' => '',
            '1' => 'Semester I',
            '2' => 'Semester II',

        ];
        $data['courses'] = $courses;
        return view('dashboard.settings.programs.program_courses.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'program_id' => 'required',
            'course_id' => 'required',
            'year' => 'required',
            'semester' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // dd($input);
        try {
            $input['program_id'] = SRS::decode($input['program_id'])[0];
            $input['year'] = SRS::decode($input['year'])[0];


            $course = $this->course_model->find($input['course_id']);

            $course->programs()->attach($input['program_id'], ['year_id' => Auth::user()->staff->year_id, 'year' => $input['year'], 'core' => $input['core'], 'semester' => $input['semester']]);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something Went wrong[course already added] ' . $e);
        }
        return back()->with('message', 'success added');


    }

    public function edit($id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Assign Course to A program']);


        try {
            $pc_id = SRS::decode($id)[0];
            // $pid = SRS::decode($program_id)[0];
            //$year = SRS::decode($year_level)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $program_course = CourseProgram::find($pc_id);

        $program = $this->program_model->find($program_course->program_id);
        //$program=Program::academicYear()->programId($pid)->first();
        $courses_all = Course::academicYear()->get();
        $data['program'] = $program;
        $data['program_id'] = $program_course->program_id;
        $data['yr'] = $program_course->year;

        $courses[''] = '';
        foreach ($courses_all as $course) {
            $courses[$course->id] = $course->course_name . '(' . $course->course_code . ')';
        }

        $data['course_options'] = [
            '' => '',
            '1' => 'Core',
            '0' => 'Option'
        ];

        $data['course_semester'] = [
            '' => '',
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
        ];
        $data['courses'] = $courses;
        $data['program_course'] = $program_course;

        return view('dashboard.settings.programs.program_courses.edit', $data);

    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'program_id' => 'required',
            'course_id' => 'required',
            'year' => 'required',
            'semester' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        //dd($input);
        $data_val['course_id'] = $input['course_id'];
        $data_val['semester'] = $input['semester'];
        $data_val['core'] = $input['core'];
        try {
            //$input['program_id'] = SRS::decode($input['program_id'])[0];
            //$input['year'] = SRS::decode($input['year'])[0];
            $id = SRS::decode($id)[0];

            CourseProgram::find($id)->update($data_val);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something Went wrong ' . $e->getMessage());
        }
        return back()->with('message', 'Course Updated Successfully');


    }

    public function destroy($id)
    {
        try {
            $id = SRS::decode($id)[0];

            CourseProgram::destroy($id);

        } catch (\Exception $e) {
            return response()->json(['Something Went Wrong! code(' . $e->getMessage() . ')']);

        }
        return response()->json(['Program-course Deleted Successfully']);


    }
}
