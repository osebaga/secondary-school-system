<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Helpers\SRS;
use App\Http\Controllers\BaseController;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Campus;
use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\CourseResult;
use App\Models\CourseStaff;
use App\Models\CourseStudent;
use App\Models\Department;
use App\Models\ExamCategory;
use App\Models\ExamCategoryResult;
use App\Models\ExamScore;
use App\Models\Faculty;
use App\Models\IntakeCategory;
use App\Models\Program;
use App\Models\Semester;
use App\Models\Staff;
use App\Models\StudyLevel;
use App\Traits\CheckCampusTrait;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

//use Maatwebsite\Excel\Validators\ValidationException;
//use mysql_xdevapi\Schema;

class CourseController extends Controller
{
    use CheckCampusTrait;

    function __construct()
    {
    }

    public function index()
    {
        if (!Gate::allows('courses-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'My Courses']);

        $staff = Auth::user()->staff;
        $semester = Semester::where('status',1)->first()->semester ?? -1;

        if (Auth::user()->roles()->first()->name == "SuperAdmin" || Auth::user()->roles()->first()->name == "HOD") {
           
    $staff_courses = DB::table('course_staff as cs')
    ->join('courses as c', 'cs.course_id', '=', 'c.id')
    ->join('study_levels as sl', 'c.study_level_id', '=', 'sl.id')
    ->join('course_program as cp', 'cp.course_id', '=', 'c.id')
    ->where('cs.year_id', Auth::user()->staff->year_id)
    ->where('cp.semester', $semester)
    ->select([
        'c.course_name',
        'c.course_code',
        'c.id as course_id',
        'sl.level_name as scheme_name',
        'cs.assigned_by',
        'cs.created_at'
    ])
    ->get();

                // dd($staff_courses);
        } else {
            $staff_courses = DB::table('course_staff as cs')
            ->join('courses as c', 'cs.course_id', '=', 'c.id')
            ->join('staffs as st', 'cs.staff_id', '=', 'st.id')
            ->join('study_levels as sl', 'c.study_level_id', '=', 'sl.id')
            ->join('course_program as cp', 'cp.course_id', '=', 'c.id')
            ->where('cs.staff_id', $staff->id)
            ->where('cs.year_id', Auth::user()->staff->year_id)
            ->where('cp.semester', $semester)
            ->select([
                'c.course_name',
                'c.course_code',
                'c.id as course_id',
                'sl.level_name as scheme_name',
                'cs.assigned_by',
                'cs.created_at'
            ])
            ->get();
        }
        $results = new \StdClass();
        foreach ($staff_courses as $course) {

            $staff = Staff::where('user_id', $course->assigned_by)->with('user')->first();
            if (!empty($staff->user)) {
                $course->assigner = $staff->user->last_name . ',' . $staff->user->first_name . ' ' . $staff->user->middle_name;
            } else {
                $course->assigner = "";
            }
            $results = $course->assigner;
        }
        $results = $staff_courses;

        $check_course_semester = DB::table('courses')
            ->join('course_program', 'courses.id', '=', 'course_program.course_id')
            ->where('course_program.year_id', '=', Auth::user()->staff->year_id)
            ->groupBy('course_program.course_id')
            ->select('courses.id AS id', 'course_program.semester')
            ->get();
        $data['staff_courses'] = $results;
        $data['check_course_semester'] = $check_course_semester;

        
        return view('dashboard.staffs.index_my_course', $data);
    }


    public function examofficermoduleresult()
    {

        if (!Gate::allows('courses-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'My Courses']);

        $staff = Auth::user()->staff;
        $staff_courses = "";
        //      
        $data['Ayear'] = AcademicYear::all();
        $data['module'] = Course::all();
        $data['program'] = Program::all();
        $data['campus'] = Campus::all();

        return view('dashboard.examofficer.courseresults', $data);
    }
    public function coursesOfferingByFacultyDepartments()
    {
        if (!Gate::allows('courses-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Modules > Module Offering']);

        $faculties = Faculty::with(['departments'])->get();
        $data['faculties'] = $faculties;
        return view('dashboard.settings.courses.index_course_offering_by_faculty', $data);
    }

    public function coursesShiftCampusSchools()
    {
        // if (! Gate::allows('courses-view')) {
        //     return abort(401);
        // }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Campuss&Schools']);
        //        $campuses = $this->campus_model->with(['faculties.departments.courses' => function ($q) {
        //            $q->where('year_id', '=', Auth::user()->staff->year_id);
        //        }])->get();
        if ($this->checkCampusAndRoles(Auth::user()->staff->campus_id)) {
            $campuses = Campus::with(['faculties.departments.courses' => function ($q) {
                $q->where('year_id', '=', Auth::user()->staff->year_id);
            }])->get();
        } else {
            $campuses = Campus::whereHas('faculties', function ($q) {
                $q->checkCampus();
            })->with(['faculties' => function ($q) {

                // $q->checkDepartments();// Auth::user()->staff->campus_id);
                $q->with(['departments' => function ($q) {
                    $q->where('id', '=', Auth::user()->staff->department_id);
                }]);
            }])->get();
        }
        //dd($campuses);
        $data['campuses'] = $campuses;

        return view('dashboard.settings.courses.index_course_shift_campuses_schools', $data);
    }

    public function courseByIntakes($course_id)
    {
        try {
            $course_id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong Please Try Again!!');
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Intakes']);
        $intakes = IntakeCategory::all();
        $data['intakes'] = $intakes;

        $data['course_id'] = $course_id;
        return view('dashboard.settings.courses.index_intakes', $data);
    }

   
    public function courseSupplementaryByIntake($course_id)
    {
        try {
            $course_id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong Please Try Again!!');
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Campuss&Schools']);
        $intakes = IntakeCategory::all();
        $data['intakes'] = $intakes;

        $data['course_id'] = $course_id;
        return view('dashboard.settings.courses.index_supp_intakes', $data);
    }
    public function supplementaryStudent($course_id, $intake_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Course Config / Supplementary']);
        try {
            $id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::academicYear()->find($id);

        $data['course'] = $course;
        $data['id'] = $course_id;
        $data['intake_id'] = $intake_id;


        return view('dashboard.settings.courses.course_students.index_supplementary_course_students', $data);
    }

    public function course_external_batches($course_id)
    {
        try {
            $course_id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong Please Try Again!!');
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Campuss&Schools']);
        $intakes = IntakeCategory::all();
        $data['intakes'] = $intakes;

        $data['course_id'] = $course_id;
        return view('dashboard.settings.courses.index_external_batches', $data);
    }

    public function courses_Shift_Panel($department_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Department Courses']);
        $id = SRS::decode($department_id)[0];

        $data['id'] = SRS::decode($department_id)[0];
        $dep = $this->department_modal->find($id);
        $bachelor_type = DB::table('courses')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->join('course_program', function ($query) {
                $query->on('course_program.course_id', '=', 'courses.id');
            })
            ->join('programs', function ($query) {
                $query->on('course_program.program_id', '=', 'programs.id');
                $query->on('programs.department_id', '=', 'departments.id');
            })
            ->join('academic_years', 'academic_years.id', '=', 'course_program.year_id')
            ->where('courses.department_id', '=', $id)
            ->where(function ($query) {
                $query->where('courses.year_id', '=', Auth::user()->staff->year_id);
                $query->where('programs.program_type', '=', 'Bachelor');
            })
            //            ->groupBy('course_code')
            ->get();
        //        dd($bachelor_type);
        //
        $diploma_type = DB::table('courses')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->join('course_program', function ($query) {
                $query->on('course_program.course_id', '=', 'courses.id');
            })
            ->join('programs', function ($query) {
                $query->on('programs.department_id', '=', 'departments.id');
                $query->on('course_program.program_id', '=', 'programs.id');
            })
            ->join('academic_years', 'academic_years.id', '=', 'course_program.year_id')
            ->where('courses.department_id', '=', $id)
            ->where(function ($query) {
                $query->where('courses.year_id', '=', Auth::user()->staff->year_id);
                $query->where('programs.program_type', '=', 'Diploma');
            })
            //            ->groupBy('course_code')
            ->get();
        $certificate_type = DB::table('courses')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->join('course_program', function ($query) {
                $query->on('course_program.course_id', '=', 'courses.id');
            })
            ->join('programs', function ($query) {
                //                $query->on('programs.department_id', '=', 'departments.id');
                $query->on('programs.id', '=', 'course_program.program_id');
            })
            ->join('academic_years', 'academic_years.id', '=', 'course_program.year_id')
            ->where('courses.department_id', '=', $id)
            ->where(function ($query) {
                $query->where('courses.year_id', '=', Auth::user()->staff->year_id);
                $query->where('programs.program_type', '=', 'Certificate');
            })
            //            ->groupBy('course_code')
            ->get();
        //        dd($certificate_type);
        $masters_type = DB::table('courses')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->join('course_program', function ($query) {
                $query->on('course_program.course_id', '=', 'courses.id');
            })
            ->join('programs', function ($query) {
                $query->on('programs.department_id', '=', 'departments.id');
                $query->on('course_program.program_id', '=', 'programs.id');
            })
            ->join('academic_years', 'academic_years.id', '=', 'course_program.year_id')
            ->where('courses.department_id', '=', $id)
            ->where(function ($query) {
                $query->where('courses.year_id', '=', Auth::user()->staff->year_id);
                $query->where('programs.program_type', '=', 'Masters');
            })
            //            ->groupBy('course_code')
            ->get();

        $postgraduate_type = DB::table('courses')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->join('programs', function ($query) {
                $query->on('programs.department_id', '=', 'departments.id');
            })
            ->join('course_program', function ($query) {
                $query->on('course_program.program_id', '=', 'programs.id');
                $query->on('course_program.course_id', '=', 'courses.id');
            })
            ->join('academic_years', 'academic_years.id', '=', 'course_program.year_id')
            ->where('courses.department_id', '=', $id)
            ->where(function ($query) {
                $query->where('courses.year_id', '=', Auth::user()->staff->year_id);
                $query->where('programs.program_type', '=', 'Postgraduate Diploma');
            })
            //            ->groupBy('course_code')
            ->get();
        //        dd($bachelor_type,$diploma_type,$certificate_type,$masters_type,$postgraduate_type,$dep);
        $data['bachelor_type'] = $bachelor_type;
        $data['diploma_type'] = $diploma_type;
        $data['certificate_type'] = $certificate_type;
        $data['masters_type'] = $masters_type;
        $data['postgraduate_type'] = $postgraduate_type;
        $data['department'] = $dep;
        return view('dashboard.settings.courses.index_shift_courses', $data);
    }

    public function shift_course($program_type, $department_id)
    {
        $id = SRS::decode($department_id)[0];
        $courses_data = DB::table('courses')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->join('course_program', function ($query) {
                $query->on('course_program.course_id', '=', 'courses.id');
            })
            ->join('programs', function ($query) {
                //                $query->on('programs.department_id', '=', 'departments.id');
                $query->on('programs.id', '=', 'course_program.program_id');
            })
            ->join('academic_years', 'academic_years.id', '=', 'course_program.year_id')
            ->where('courses.department_id', '=', $id)
            ->where(function ($query) use ($program_type) {
                $query->where('courses.year_id', '=', Auth::user()->staff->year_id);
                $query->where('programs.program_type', '=', $program_type);
            })
            //            ->groupBy('course_code')
            ->get();
        try {
            DB::beginTransaction();
            foreach ($courses_data as $item) {
                $course = [
                    //                    'department_id' => $item->department_id,
                    //                    'year_id' => Auth::user()->staff->year_id + 1,
                    'course_name' => $item->course_name,
                    'course_category' => $item->course_category,
                    'min_cw' => $item->min_cw,
                    'score_type' => $item->score_type,
                    'study_level_id' => $item->study_level_id,
                    'pass_grade' => $item->pass_grade,
                    'unit' => $item->unit,
                    'cw' => $item->cw,
                    'final' => $item->final
                ];

                $where = [
                    'department_id' => $item->department_id,
                    'year_id' => Auth::user()->staff->year_id + 1,
                    'course_code' => $item->course_code,
                ];
                //                dd($course,$where);
                $c = Course::firstOrCreate($where, $course);
                //                dd(SRS::get_program_shifted($item->program_code, (Auth::user()->staff->year_id + 1)));
                $course_program = [
                    //                    'course_id' => $c->id,
                    //                    'program_id' => SRS::get_program_shifted($item->program_code, (Auth::user()->staff->year_id + 1)),
                    //                    'year_id' => Auth::user()->staff->year_id + 1,
                    'year' => 1,
                    'core' => $item->core,
                    'semester' => $item->semester,
                ];
                $where_program = [
                    'course_id' => $c->id,
                    'program_id' => SRS::get_program_shifted($item->program_code, (Auth::user()->staff->year_id + 1)),
                    'year_id' => Auth::user()->staff->year_id + 1,
                ];
                $cp = CourseProgram::firstOrcreate($where_program, $course_program);

                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }
        return back()->with('message', 'Courses Shifted Successfully !!!');
    }


    public function coursesOfferingConfigByDepartment()
    {
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Modules > Modules Config']);

        $faculties = Faculty::with(['departments'])->get();
        //dd($faculties);
        $data['faculties'] = $faculties;

        return view('dashboard.settings.courses.index_course_offering_config_by_department', $data);
    }

    public function configDepartmentCourses($department_id, $campus_id)
    {
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => url()->previous(), 'page' => 'Settings > Modules > Modules Config'],['link' => '#', 'page' => 'Module Offering - '.Department::find(SRS::decode($department_id)[0])->department_name ?? '']);
        try {
            $id = SRS::decode($department_id)[0];
            $faculty_id = SRS::decode($campus_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }


        $data['id'] = $department_id;
        $data['campus_id'] = $campus_id;
        $dep = Department::find($id);

        $courses_sem1 = array();
        $courses_sem2 = array();

        $programs = DB::table("departments")
            ->join('courses as c', function ($join) use ($id) {
                $join->on('c.department_id', '=', 'departments.id');
                
                $join->where('c.department_id', '=', $id);
            })
            ->get(['*', 'c.id as cp_id', 'c.id as course_id']);

        //dd("dd");
        if (!empty($programs)) {
            foreach ($programs as $course) {


                $data['department'] = $dep;
                $data['courses_sem1'] = $courses_sem1;
                $data['courses_sem2'] = $courses_sem2;


                $courses = Course::where('department_id', $id)->get();
                $data['courses'] = $courses;



                
                return view('dashboard.settings.courses.index_course_config', $data);
            }
        }
    }

    public function check_course_semester($course_id)
    {

        $data = DB::table("programs as p")
          //  ->where('p.year_id', '=', Auth::user()->staff->year_id)
            ->join('faculties as f', function ($join) {
                $join->on('f.id', '=', 'p.faculty_id');
            })
            ->join('departments as d', function ($join) {
                $join->on('d.faculty_id', '=', 'f.id');
            })->join('courses as c', function ($join) {
               // $join->on('c.year_id', '=', 'p.year_id');
               // $join->where('c.year_id', '=', Auth::user()->staff->year_id);
            })
            ->join('course_program as cp', function ($join) {
                $join->on('cp.course_id', '=', 'c.id');
                $join->on('cp.program_id', '=', 'p.id');
            })
            ->where('c.id', '=', $course_id)
            ->select('cp.semester')
            ->groupBy('c.id')
            ->get();
        $semester = "";
        if (count($data) > 0) {
            foreach ($data as $datas) {
                $semester = $datas->semester;
                
            }
        }
        return $semester;
    }

    public function courseDetails($course_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Course Config']);
        try {
            $cid = SRS::decode($course_id)[0];
            // $dept_id = SRS::decode($dept_id)[0];
        } catch (\Exception $e) {

            abort(404);
        }

        $course = Course::where('courses.id',  $cid)
            ->with(['study_level', 'department.faculty.campus.institution', 'staffs' => function ($q) use ($cid) {
                $q->wherePivot('year_id', '=', Auth::user()->staff->year_id);
                $q->wherePivot('course_id', '=', $cid);
            }])->first();


        $users = DB::table('users AS u')
            ->join('staffs AS s', function ($join){
                $join->on('u.id', '=', 's.user_id');
                $join->where('u.status', '=', '1');
                $join->where('u.type', '=', '1');
            
            })
            
            ->get(['u.id AS user_id', 'u.first_name', 'u.last_name', 'u.middle_name', 's.id AS staff_id']);

        $staffs[''] = '';
        foreach ($users as $user) {
            $staffs[$user->staff_id] = $user->last_name . ',' . $user->first_name . ' ' . $user->middle_name;
        }

        $programs = [];
        $program_all = DB::table('programs as p')
            ->join('course_program as cp', function ($join) use ($cid) {
                $join->on('p.id', '=', 'cp.program_id');
                $join->where('cp.course_id', '=', $cid);
                $join->where('cp.year_id', '=', Auth::user()->staff->year_id);
            })->get();

        foreach ($program_all as $p) {
            $programs[$p->program_id] = '[ ' . $p->program_acronym . ' ]' . $p->program_name;

        }



        $data['course'] = $course;
        $data['course_staffs'] = $course->staffs;
        $data['staffs'] = $staffs;

        $data['programs'] = $programs;
        return view('dashboard.settings.courses.index_course_config_details', $data);
    }

    public function end_semester_report($course_ids, $batch)
    {
        $course_id = SRS::decode($course_ids)[0];
        $batch_no = SRS::decode($batch)[0];
        //        dd($course_id,$batch_no);

        $course = DB::table('courses')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->join('academic_years', function ($join) {
                $join->on('academic_years.id', '=', 'courses.year_id');
            })
            ->join('course_program', function ($join) {
                $join->on('course_program.course_id', '=', 'courses.id');
                //                $join->on('course_program.program_id', '=', 'programs.id');
                $join->on('course_program.year_id', '=', 'academic_years.id');
            })
            ->join('programs', 'programs.id', '=', 'course_program.program_id')
            ->join('study_levels', 'study_levels.id', '=', 'courses.study_level_id')
            ->where('courses.id', '=', $course_id)
            ->get();
        //        dd($course);
        $academic_year = '';
        $year_of_study = '';
        $semester = '';
        $department_id = '';
        foreach ($course as $courses) {
            $academic_year = $courses->year_id;
            $year_of_study = $courses->year;
            $semester = $courses->semester;
            $department_id = $courses->department_id;
        }


        //        $pcode = $programme_code;
        //        dd($academic_year);
        $data['course_data'] = array();
        $data['student'] = array();
        $data['year_study'] = "";
        $data['request_semester'] = "";
        $data['departments_id'] = "";
        $data['course_id'] = "";
        $data['programs_code'] = "";
        if (!is_null($academic_year)) {
            $course_data = DB::table('courses AS cs')
                ->join('departments', function ($join) use ($department_id) {
                    $join->on('departments.id', '=', 'cs.department_id');
                    //                    $join->where('cs.department_id', '=', $department_id);
                    //                    $join->where('departments.faculty_id', '=', 1);
                })
                ->join('academic_years', function ($join) use ($academic_year) {
                    $join->on('academic_years.id', '=', 'cs.year_id');
                    $join->where('cs.year_id', '=', $academic_year);
                })
                ->join('course_staff', function ($join) use ($academic_year) {
                    $join->on('cs.id', '=', 'course_staff.course_id');
                    $join->on('academic_years.id', '=', 'course_staff.year_id');
                    $join->where('course_staff.year_id', '=', $academic_year);
                })
                ->join('staffs', function ($join) {
                    $join->on('staffs.id', '=', 'course_staff.staff_id');
                })
                ->join('users', function ($join) {
                    $join->on('users.id', '=', 'staffs.user_id');
                })
                ->where('cs.id', '=', $course_id)
                ->select('cs.*', 'departments.*', 'academic_years.*', 'course_staff.*', 'staffs.*', 'users.*', DB::raw('CONCAT(CONCAT(users.first_name," "),CONCAT(users.middle_name," "),CONCAT(users.last_name," ")) AS instructor_name'), 'users.first_name as fn', 'users.middle_name AS mn', 'users.last_name AS ln')
                ->groupBy('course_staff.course_id')
                ->get();


            $student = DB::table('students AS st')
                ->where('st.batch_id', '=', $batch_no)
                ->join('users', 'users.id', '=', 'st.user_id')
                ->join('academic_years', function ($join) use ($academic_year) {
                    $join->on('academic_years.id', '=', 'st.year_id');
                    $join->where('st.year_id', '=', $academic_year);
                })
                ->join('course_student', function ($join) use ($academic_year, $semester) {
                    $join->on('course_student.student_id', '=', 'st.id');
                    $join->on('course_student.reg_no', '=', 'st.reg_no');
                    $join->on('course_student.year_id', '=', 'academic_years.id');
                    $join->where('course_student.semester', '=', $semester);
                    $join->where('course_student.year_id', '=', $academic_year);
                })
                ->join('courses', function ($join) use ($academic_year, $course_id, $department_id) {
                    $join->on('courses.id', '=', 'course_student.course_id');
                    $join->where('course_student.course_id', '=', $course_id);
                })
                ->join('study_levels', function ($join) {
                    $join->on('study_levels.id', '=', 'courses.study_level_id');
                })
                ->join('course_works', function ($join) use ($academic_year, $course_id, $department_id, $semester) {
                    $join->on('course_student.id', '=', 'course_works.cs_id');
                    $join->on('st.reg_no', '=', 'course_works.reg_no');
                    $join->on('courses.id', '=', 'course_works.course_id');
                    $join->on('course_works.year_id', '=', 'academic_years.id');
                    $join->where('course_works.year_id', '=', $academic_year);
                    $join->where('course_works.semester', '=', $semester);
                })
                ->join('results', function ($join) use ($academic_year, $course_id, $department_id, $semester) {
                    $join->on('course_student.id', '=', 'results.cs_id');
                    $join->on('st.reg_no', '=', 'results.reg_no');
                    $join->on('courses.id', '=', 'results.course_id');
                    $join->on('results.year_id', '=', 'academic_years.id');
                    $join->where('results.year_id', '=', $academic_year);
                    $join->where('results.semester', '=', $semester);
                })
                ->select("st.*", 'users.*', 'academic_years.*', 'course_student.*', 'courses.*', 'course_works.*', 'results.*', 'results.sit AS se_sit', DB::raw('CONCAT(CONCAT(users.first_name," "),CONCAT(users.middle_name," "),CONCAT(users.last_name," ")) AS student_name'), 'study_levels.*', 'users.first_name as fn', 'users.middle_name AS mn', 'users.last_name AS ln')
                //                ->select("st.*", 'users.*', 'academic_years.*', 'course_student.*', 'courses.*', 'course_works.*', 'results.*', DB::raw('CONCAT(CONCAT(users.first_name," "),CONCAT(users.middle_name," "),CONCAT(users.last_name," ")) AS student_name'), 'study_levels.*', 'users.first_name as fn', 'users.middle_name AS mn', 'users.last_name AS ln')
                //                ->where('st.reg_no', 'like', '%/' . $pcode . '/%')
                ->get();
            //            dd($course_data);
            //             dd($student);
            $data['course_data'] = $course_data;
            $data['student'] = $student;
            $data['year_study'] = $year_of_study;
            $data['request_semester'] = $semester;
            $data['departments_id'] = $department_id;
            $data['course_id'] = $course_id;
            $data['academic_yearsss'] = $academic_year;
            //            $data['programs_code'] = $pcode;
        }


        return view('dashboard.reports.report_by_course', $data);
    }

    public function supplementary_semester_report($course_ids)
    {
        $course_id = SRS::decode($course_ids)[0];
        $course = DB::table('courses')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->join('programs', 'programs.department_id', '=', 'departments.id')
            ->join('academic_years', function ($join) {
                $join->on('academic_years.id', '=', 'courses.year_id');
            })
            ->join('course_program', function ($join) {
                $join->on('course_program.course_id', '=', 'courses.id');
                $join->on('course_program.program_id', '=', 'programs.id');
                $join->on('course_program.year_id', '=', 'academic_years.id');
            })
            ->join('study_levels', 'study_levels.id', '=', 'courses.study_level_id')
            ->where('courses.id', '=', $course_id)
            ->get();
        $academic_year = '';
        $year_of_study = '';
        $semester = '';
        $department_id = '';
        foreach ($course as $courses) {
            $academic_year = $courses->year_id;
            $year_of_study = $courses->year;
            $semester = $courses->semester;
            $department_id = $courses->department_id;
        }


        //        $pcode = $programme_code;
        //        dd($academic_year);
        $data['course_data'] = array();
        $data['student'] = array();
        $data['year_study'] = "";
        $data['request_semester'] = "";
        $data['departments_id'] = "";
        $data['course_id'] = "";
        $data['programs_code'] = "";
        if (!is_null($academic_year)) {
            $course_data = DB::table('courses AS cs')
                ->join('departments', function ($join) use ($department_id) {
                    $join->on('departments.id', '=', 'cs.department_id');
                    $join->where('cs.department_id', '=', $department_id);
                    $join->where('departments.faculty_id', '=', 1);
                })
                ->join('academic_years', function ($join) use ($academic_year) {
                    $join->on('academic_years.id', '=', 'cs.year_id');
                    $join->where('cs.year_id', '=', $academic_year);
                })
                ->join('course_staff', function ($join) use ($academic_year) {
                    $join->on('cs.id', '=', 'course_staff.course_id');
                    $join->on('academic_years.id', '=', 'course_staff.year_id');
                    $join->where('course_staff.year_id', '=', $academic_year);
                })
                ->join('staffs', function ($join) {
                    $join->on('staffs.id', '=', 'course_staff.staff_id');
                })
                ->join('users', function ($join) {
                    $join->on('users.id', '=', 'staffs.user_id');
                })
                ->where('cs.id', '=', $course_id)
                ->select('cs.*', 'departments.*', 'academic_years.*', 'course_staff.*', 'staffs.*', 'users.*', DB::raw('CONCAT(CONCAT(users.first_name," "),CONCAT(users.middle_name," "),CONCAT(users.last_name," ")) AS instructor_name'), 'users.first_name as fn', 'users.middle_name AS mn', 'users.last_name AS ln')
                ->get();


            $student = DB::table('students AS st')
                ->join('users', 'users.id', '=', 'st.user_id')
                ->join('academic_years', function ($join) use ($academic_year) {
                    $join->on('academic_years.id', '=', 'st.year_id');
                    $join->where('st.year_id', '=', $academic_year);
                })
                ->join('course_student', function ($join) use ($academic_year, $semester) {
                    $join->on('course_student.student_id', '=', 'st.id');
                    $join->on('course_student.reg_no', '=', 'st.reg_no');
                    $join->on('course_student.year_id', '=', 'academic_years.id');
                    $join->where('course_student.semester', '=', $semester);
                    $join->where('course_student.year_id', '=', $academic_year);
                })
                ->join('courses', function ($join) use ($academic_year, $course_id, $department_id) {
                    $join->on('courses.id', '=', 'course_student.course_id');
                    $join->where('course_student.course_id', '=', $course_id);
                })
                ->join('study_levels', function ($join) {
                    $join->on('study_levels.id', '=', 'courses.study_level_id');
                })
                ->join('course_works', function ($join) use ($academic_year, $course_id, $department_id, $semester) {
                    $join->on('course_student.id', '=', 'course_works.cs_id');
                    $join->on('st.reg_no', '=', 'course_works.reg_no');
                    $join->on('courses.id', '=', 'course_works.course_id');
                    $join->on('course_works.year_id', '=', 'academic_years.id');
                    $join->where('course_works.year_id', '=', $academic_year);
                    $join->where('course_works.semester', '=', $semester);
                })
                ->join('results', function ($join) use ($academic_year, $course_id, $department_id, $semester) {
                    $join->on('course_student.id', '=', 'results.cs_id');
                    $join->on('st.reg_no', '=', 'results.reg_no');
                    $join->on('courses.id', '=', 'results.course_id');
                    $join->on('results.year_id', '=', 'academic_years.id');
                    $join->where('results.year_id', '=', $academic_year);
                    $join->where('results.semester', '=', $semester);
                })
                ->select("st.*", 'users.*', 'academic_years.*', 'course_student.*', 'courses.*', 'course_works.*', 'results.*', DB::raw('CONCAT(CONCAT(users.first_name," "),CONCAT(users.middle_name," "),CONCAT(users.last_name," ")) AS student_name'), 'study_levels.*', 'users.first_name as fn', 'users.middle_name AS mn', 'users.last_name AS ln')
                //                ->select("st.*", 'users.*', 'academic_years.*', 'course_student.*', 'courses.*', 'course_works.*', 'results.*', DB::raw('CONCAT(CONCAT(users.first_name," "),CONCAT(users.middle_name," "),CONCAT(users.last_name," ")) AS student_name'), 'study_levels.*', 'users.first_name as fn', 'users.middle_name AS mn', 'users.last_name AS ln')
                //                ->where('st.reg_no', 'like', '%/' . $pcode . '/%')
                ->get();
            $student_failed = [];
            //            or
            //            $student_failed=array();
            foreach ($student as $item) {
                $result = SRS::get_remarks_report($item->year_id, $item->course_id, SRS::calculate_total_course_work_report($item->a1, $item->a2, $item->t1, $item->t2), $item->score, $item);
                if ($result == "Failed" || $result == '') {
                    $student_failed[] = $item;
                }
            }
            $data['course_data'] = $course_data;
            $data['student'] = $student_failed;
            $data['year_study'] = $year_of_study;
            $data['request_semester'] = $semester;
            $data['departments_id'] = $department_id;
            $data['course_id'] = $course_id;
            $data['academic_yearsss'] = $academic_year;
        }

        return view('dashboard.reports.report_by_course', $data);
    }

    public function courseAssignInstructor(Request $request)
    {
        $input = $request->all();
        $input['year_id'] = Auth::user()->staff->year_id;
        $input['assigned_by'] = Auth::id();
        $validator = Validator::make($input, [
            'year_id' => 'required|numeric',
            'staff_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'assigned_by' => 'required|numeric',
            // 'stream' => 'required|string'
        ]);

        $where = [
            'course_id' => $input['course_id'],
            'year_id' => $input['year_id'],
            // 'stream' => $input['stream'],
        ];
        $data = [
            'assigned_by' => $input['assigned_by'],
            'staff_id' => $input['staff_id'],
        ];


        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }


        // dd($input);


        try {
            CourseStaff::updateOrCreate($where, $data);
            // foreach ($input['program_id'] as $program_id) {
            //     $program = CourseProgram::academicYear()->where('course_id', '=', $input['course_id'])
            //         ->where('program_id', '=', $program_id)->first();

            //     // $program->update(['stream' => $input['stream']]);
            // }
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
        return back()->with('message', 'Instructor Successfully Created/Update');
    }

    public function instructorAssignCourses(Request $request)
    {

        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Courses']);
        return view('dashboard.staffs.index_staff_assign_course', $data);
    }

    public function deleteCourseInstructor(Request $request)
    {
        $input = $request->all();
        try {
            CourseStaff::where(['course_id' => $input['course_id'], 'year_id' => [$input['year_id']]])->delete();
        } catch (\Exception $e) {
            return back()->withInput()->with('error', "Something Went wrong code=('.$e->getCode().')'");
        }
        return back()->with('message', 'Instructor Removed Successfully');
    }

    public function courseStudents($course_id, $intake_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Courses']);
        try {
            $course_id = SRS::decode($course_id)[0];
            $intake_id = SRS::decode($intake_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::where('id', '=', $course_id)->first();
        $exam_categories = ExamCategory::pluck('name', 'id');

        // $courseStudent = $course->students->where('');
        $year_id = Auth::user()->staff->year_id;
        $campus_id = Auth::user()->staff->campus_id;
        $check_sem1_upload = SRS::checkUploadStatus($campus_id, $intake_id, 1, 1, $year_id);
        $check_sem2_upload = SRS::checkUploadStatus($campus_id, $intake_id, 2, 1, $year_id);

        $data['course'] = $course;


        $data['exam_categories'] = $exam_categories;
        $data['course_id'] = $course_id;
        $data['intake_id'] = $intake_id;
        $data['check_sem1_upload'] = $check_sem1_upload;
        $data['check_sem2_upload'] = $check_sem2_upload;

         //dd($course);
        // if ($course->course_status == 1) {
        //     return view('dashboard.settings.courses.course_students.index_registered_coursewithpractical_students', $data);
        // } else {
            return view('dashboard.settings.courses.course_students.index_registered_course_students', $data);
        // }
    }


    public function ModuleByIntake($course_id)
    {
        try {
            $course_id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong Please Try Again!!');
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Intakes']);
        $intakes = IntakeCategory::all();
        $data['intakes'] = $intakes;

        $data['course_id'] = $course_id;
        return view('dashboard.settings.courses.index_module_intakes', $data);
    }

    public function CAandESEResults($course_id, $intake_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Courses']);
        try {
            $course_id = SRS::decode($course_id)[0];
            $intake_id = SRS::decode($intake_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::where('id', '=', $course_id)->first();
        $exam_categories = ExamCategory::pluck('name', 'id');

        // $courseStudent = $course->students->where('');
        $year_id = Auth::user()->staff->year_id;
        $campus_id = Auth::user()->staff->campus_id;
        $check_sem1_upload = SRS::checkUploadStatus($campus_id, $intake_id, 1, 1, $year_id);
        $check_sem2_upload = SRS::checkUploadStatus($campus_id, $intake_id, 2, 1, $year_id);

        $data['course'] = $course;


        $data['exam_categories'] = $exam_categories;
        $data['course_id'] = $course_id;
        $data['intake_id'] = $intake_id;
        $data['check_sem1_upload'] = $check_sem1_upload;
        $data['check_sem2_upload'] = $check_sem2_upload;

         //dd($course);
        // if ($course->course_status == 1) {
        //     return view('dashboard.settings.courses.course_students.index_registered_coursewithpractical_students', $data);
        // } else {
            return view('dashboard.settings.courses.course_students.index_ca_ese_results_module', $data);
        // }
    }

    public function createPDF($id)
    {

        try {
            $course_id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Courses']);

        // $data['data'] = ExamCategoryResult::join('courses','course.id', '=','exam_category_results.course_id')->where(['courses.id'=>$course_id]);

        $data['data'] = ExamCategoryResult::join('exam_scores', 'exam_scores.reg_no', '=', 'exam_category_results.reg_no')
            ->join('users', 'users.username', '=', 'exam_category_results.reg_no')
            ->join('courses', 'courses.id', '=', 'exam_category_results.course_id')
            ->where(['exam_scores.course_id' => $course_id])->where(['exam_category_results.course_id' => $course_id])->whereHas('examCategory', function ($q) {
                $q->where('exam_categories.type', '=', 'CA');
            })->with('examCategory')->get();

        $data['course'] = Course::find($course_id);

        view()->share('dashboard.settings.courses.course_students.index_registered_course_students', $data);
        $pdf = PDF::loadView('dashboard.settings.courses.course_students.index_registered_coursepdf', $data);
        ob_end_clean();
        return $pdf->setPaper('A4', 'portrait')->download('ContAss.pdf');
    }



    public function getJsonStudentCourseWork($course_id, $batch_id)
    {
        $id = "";
        try {
            $id = SRS::decode($course_id)[0];
            $batch_id = SRS::decode($batch_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
    
        $staff_id = Auth::user()->roles->first()->name == "HOD" || Auth::user()->roles->first()->name == "SuperAdmin"
            ? $this->getCourseInstructor($id)
            : Auth::user()->staff->id;
    
        $course_staff = CourseStaff::join('course_program', 'course_staff.course_id', '=', 'course_program.course_id')
            ->where(['staff_id' => $staff_id, 'course_staff.course_id' => $id])
            ->get();
    
        $records = ExamCategoryResult::join('student_classes', 'exam_category_results.reg_no', '=', 'student_classes.reg_no')
            ->whereHas('examCategory', function ($q) use ($id, $course_staff) {
                $q->where('course_id', $id)
                  ->where('exam_category_results.year_id', Auth::user()->staff->year_id)
                  ->whereIn('student_classes.program_id', $course_staff->pluck('program_id'));
            })
            ->with('examCategory')
            ->select('exam_category_results.*',
                DB::raw("MAX(CASE WHEN exam_category_id = 1 THEN exam_score END) AS assignment_1"),
                DB::raw("MAX(CASE WHEN exam_category_id = 2 THEN exam_score END) AS assignment_2"),
                DB::raw("MAX(CASE WHEN exam_category_id = 3 THEN exam_score END) AS wr_1"),
                DB::raw("MAX(CASE WHEN exam_category_id = 4 THEN exam_score END) AS wr_2"),
                DB::raw("MAX(CASE WHEN exam_category_id = 6 THEN exam_score END) AS opseca") // Assuming opseca is for a specific exam category
            )
            ->groupBy('exam_category_results.reg_no');
    
        return DataTables::of($records)
            ->addIndexColumn()
            ->addColumn('full_name', function ($record) {
                return $record->student->user->last_name . ', ' . $record->student->user->first_name;
            })
            ->addColumn('sex', function ($record) {
                return $record->student->user->gender;
            })
            ->addColumn('avgScore', function ($record) {
                $assgm1 = $record->assignment_1 ?? 0;
                $assgm2 = $record->assignment_2 ?? 0;
                $wr1 = $record->wr_1 ?? 0;
                $wr2 = $record->wr_2 ?? 0;
                $opseca = $record->opseca ?? 0; // Assuming opseca score
    
                $course_status = Course::find($record->course_id)->course_status;
    
                if ($course_status == 0) { // without practical
                    $avgScore = round( (((($assgm1 + $assgm2) / 2) / 100) * 10) +
                    (((($wr1 + $wr2) / 2) / 100) * 30),1); 

                } else if ($course_status == 1) { //with practical
                
                    $avgScore = round( (((($assgm1 + $assgm2) / 2) / 100) * 5) +
                    (((($wr1 + $wr2) / 2) / 100) * 15) + (($opseca / 100) * 20) ,1); 
                }
    
                return $avgScore;
            })
            ->make(true);
    }


    public function getJsonStudentCourseResult($course_id, $intake_id)
    {
        $id = "";
        try {
            $id = SRS::decode($course_id)[0];
            $intake_id = SRS::decode($intake_id)[0];
        } catch (\Exception $e) {
            abort(404);
        };
        $staff_id = "";

        if (Auth::user()->roles->first()->name == "ExamOfficer" || Auth::user()->roles->first()->name == "HOD" || Auth::user()->roles->first()->name == "SuperAdmin") {
            $staff_id = $this->getCourseInstructor($id);
        } else {
            $staff_id = Auth::user()->staff->id;
        }


        $course_staff = CourseStaff::where(['staff_id' => $staff_id, 'course_id' => $id])->first();
        $stream = $course_staff->stream;


            //    $records= ExamCategoryResult::where(['course_id'=>$id])->whereHas('examCategory', function ($q) {
            //        $q->where('exam_categories.type','=','SE');
            //    })->with('examCategory');
    $staff_year =  $staff_id = Auth::user()->staff->year_id;
        $records = CourseResult::where('course_id',$id)
                                ->where('year_id',$staff_year)->get();
            
                   
        //dd($records);

        return DataTables::of($records)
            ->addIndexColumn()
            ->addColumn('full_name', function ($record) {
                return $record->student->user->last_name . ',' . $record->student->user->first_name;
            })
            ->addColumn('sex', function ($record) {
                return $record->student->user->gender;
            })

            ->make(true);
    }

    public function getCourseInstructor($course_id)
    {
        $course_staff = CourseStaff::where(['course_id' => $course_id])->first();
        // dd($course_staff);

        return $course_staff->staff_id;
    }
    public function getJsonFieldCourseStudents($course_id, $batch_id)
    {
        try {
            $id = SRS::decode($course_id)[0];
            $batch_id = SRS::decode($batch_id)[0];
        } catch (\Exception $e) {
            abort(404);
        };
        $staff_id = Auth::user()->staff->id;

        $course_staff = CourseStaff::where(['staff_id' => $staff_id, 'course_id' => $id])->first();
        $stream = $course_staff->stream;
        $records = DB::table('students as std')
            ->where('std.batch_id', '=', $batch_id)
            ->join('users AS u', function ($join) {
                $join->on('u.id', '=', 'std.user_id');
            })
            ->join('course_program as cp', function ($join) use ($id, $stream) {
                $join->on('cp.program_id', '=', 'std.program_id');
                $join->on('cp.year', '=', 'std.year_of_study');
                $join->where('cp.stream', '=', $stream);
            })
            ->join('course_student as cs', function ($join) use ($id) {
                $join->on('cs.course_id', '=', 'cp.course_id');
                $join->on('cs.year_id', '=', 'std.year_id');
                $join->on('cs.reg_no', '=', 'std.reg_no');
                $join->where('cs.course_id', '=', $id);
            })
            ->join('courses as c', function ($join) {
                $join->on('c.id', '=', 'cp.course_id');
                $join->on('c.id', '=', 'cs.course_id');
            })
            ->join('course_staff AS cst', function ($join) use ($staff_id, $stream) {
                $join->on('cp.course_id', '=', 'cst.course_id');
                $join->where('cst.staff_id', '=', $staff_id);
                $join->where('cst.stream', '=', $stream);
            })
            ->join('course_works as cw', function ($join) {
                $join->on('cw.cs_id', '=', 'cs.id');
            })
            ->where('cst.staff_id', '=', $staff_id)
            ->orWhere(function ($query) use ($staff_id) {
                $query->where('cst.staff_id', '!=', $staff_id);
            })
            ->get();
        //            ->select(['u.first_name', 'u.last_name', 'u.middle_name', 'u.gender', 'std.id as student_id', 'std.reg_no', 'std.year_id', 'cw.a1', 'cw.a2', 'cw.t1', 'cw.t2', 'cw.portfolio', 'cw.total_ca', 'ue.score', 'ue.sit', 'ue.sit AS ue_sit', 'ue.supp_score', 'cw.remark', 'cs.id as cs_id', 'cs.semester', 'cs.cs_status', 'cs.carry_over', 'c.score_type', 'c.study_level_id', 'c.min_cw', 'c.min_ue', 'c.pass_grade', 'c.cw', 'c.final', 'c.id as course_id']);

        $total = 0;
        //dd($records);
        return DataTables::of($records)
            ->addIndexColumn()
            ->addColumn('full_name', function ($std) {
                return $std->last_name . ',' . $std->first_name . ' ' . $std->middle_name;
            })
            ->editColumn('presentation', function ($std) {
                if ($std->presentation < 0) {
                    return '-';
                }
                return $std->presentation;
            })
            ->editColumn('field_attachment', function ($std) {
                if ($std->field_attachment < 0) {
                    return '-';
                }
                return $std->field_attachment;
            })
            ->editColumn('special_paper', function ($std) {
                if ($std->special_paper < 0) {
                    return '-';
                }
                return $std->special_paper;
            })
            ->addColumn('total', function ($std) use ($total) {
                if ($std->sit > 1) {
                    if ($std->total_ca < 0) {
                        return '-';
                    } elseif ($std->total_ca > 0) {
                        return $std->total_ca;
                    }
                } else {
                    if ($std->total_ca < 0) {
                        return '-';
                    } elseif ($std->total_ca > 0) {
                        return $std->total_ca;
                    }
                }
            })
            //            //   Luka Editing.............................................
            ->addColumn('grade', function ($std) use ($id) {
                $grade = SRS::getGrade(Auth::user()->staff->year_id, $id);
                // dd('A'>'B' ? "yes":"no");
                //dd($grade);
                $total = 0;
                if ($std->sit > 1) {
                    if ($std->total_ca < 0) {
                        return '-';
                    } elseif ($std->total_ca > 0) {
                        $total = $std->total_ca;
                    } else {
                        $total = $std->total_ca;
                    }
                } else {
                    if ($std->total_ca < 0) {
                        return '-';
                    } elseif ($std->total_ca > 0) {
                        $total = $std->total_ca;
                    } else {
                        $total = $std->score + $std->total_ca;
                    }
                }
                $total = floor($total);
                //dd($total,$grade);
                if ($std->sit == 1 && $std->carry_over == 0 || $std->study_level_id == 6 || $std->study_level_id == 7 || $std->study_level_id == 8) {
                    //                if ($std->sit == 1 && $std->carry_over == 0) {
                    foreach ($grade as $g) {
                        if ($total <= $g->high_value && $total >= $g->low_value) {
                            if (($std->total_ca) < ($std->min_cw + $std->min_ue)) {
                                if (($std->total_ca) == 0) {
                                    return "-";
                                } else {
                                    return "F";
                                }
                            } elseif (($std->total_ca >= $std->min_cw) && ($std->total_ca < $std->min_ue)) {
                                if (($std->total_ca) == 0) {
                                    return "-";
                                } else {
                                    return "F*";
                                }
                            } else {
                                if (($std->total_ca) == 0) {
                                    return "-";
                                } else {
                                    return $g->grade;
                                }
                            }
                        } else {
                            ////                            new changes for community student.............................
                            //                            if (($std->total_ca + $std->score) < $std->cw) {
                            //                                return "F";
                            //                            } elseif ((($std->total_ca + $std->score) > $std->cw) && ($std->score < ($std->cw - $std->min_cw))) {
                            //                                return "F<b style='color: red'>*</b>";
                            //                            } else {
                            //                                return $g->grade;
                            //                            }
                        }
                    }
                } else {
                    foreach ($grade as $g) {
                        if ($total <= $g->high_value && $total >= $g->low_value) {
                            $std_grade = $g->grade;
                            if ($std_grade <= $std->pass_grade && ($total >= 0)) {
                                //                                return '*' . $std->pass_grade . '*';
                                return $std->pass_grade;
                            } elseif ($std_grade > $std->pass_grade && ($total >= 0)) {
                                //                                return '*' . $std_grade . '*';
                                return $std_grade;
                            } else {
                                return 'Inc.';
                            }
                        }
                    }
                }
            })
            //            //   Luka Editing.............................................
            //            ->editColumn('ca_remark', function ($std) use ($total) {
            //                if ($std->total_ca < $std->min_cw) {
            //                    return "<span class='btn btn-danger btn-sm'>INC</span>";
            //                } else {
            //                    return "Pass";
            //                }
            //            })
            ->editColumn('remark', function ($std) use ($id) {
                $remark = "";
                if ($std->presentation == "-999" || $std->field_attachment == "-999" || $std->special_paper == "-999") {
                    $remark = "-";
                } else {
                    if ($std->sit > 1) {
                        if (is_numeric($std->total_ca)) {
                            //  $record->grade = SRS::get_grade_report_final($record->year_id, $record->course_id, $record->ca_total, $record, $record->score);
                            $remark = SRS::get_remarks_report($std->year_id, $id, $std->total_ca, 0, $std);
                            //  $record->gpa1=SRS::calculate_report_gpa();
                        } else {
                            //   $record->grade = "-";
                            $remark = SRS::get_remarks_report($std->year_id, $id, 0, 0, $std);
                        }
                    } else {
                        if (is_numeric($std->total_ca)) {
                            //  $record->grade = SRS::get_grade_report_final($record->year_id, $record->course_id, $record->ca_total, $record, $record->score);
                            $remark = SRS::get_remarks_report($std->year_id, $id, $std->total_ca, 0, $std);
                            //  $record->gpa1=SRS::calculate_report_gpa();
                        } else {
                            //   $record->grade = "-";
                            $remark = SRS::get_remarks_report($std->year_id, $id, 0, 0, $std);
                        }
                    }
                }
                return $remark;
            })
            //            // Luka finishing editing..........................................
            ->rawColumns(['grade', 'ca_remark', 'remark'])
            ->editColumn('cs_status', function ($std) {
                return $std->cs_status;
            })
            ->make(true);
    }


    //Program Participants
    public function courseParticipantProgrammes($course_id)
    {

        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Courses']);
        try {
            $id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $data['course'] = Course::find($id);
        $data['id'] = $course_id;
        return view('dashboard.settings.courses.course_students.index_participant_programs_course_students', $data);
    }

    public function getJsonCourseParticipantProgrammes($course_id)
    {
        try {
            $id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        };

        $programs = DB::table('programs as p')
            ->join('course_program as cp', function ($join) use ($id) {
                $join->on('p.id', '=', 'cp.program_id');
                $join->where('cp.course_id', '=', $id);
                
            })->get();
        return DataTables::of($programs)
            ->addIndexColumn()
            ->editColumn('core', function ($program) {
                return SRS::course_option($program->core);
            })
            ->make(true);
    }
    public function carryOverStudent($course_id)
    {

        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Course Config / Carry Over']);

        try {
            $id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::academicYear()->find($id);
        $data['course'] = $course;

        return view('dashboard.settings.courses.course_students.index_carry_over_course_students', $data);
    }

    public function getJsonCarryStudent($course_id)
    {
        try {
            $id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        };
        $staff_id = Auth::user()->staff->id;
    }


    public function getJsonSupplementaryStudent($course_id, $batch_id)
    {
        try {
            $id = SRS::decode($course_id)[0];
            $batch_id = SRS::decode($batch_id)[0];
        } catch (\Exception $e) {
            abort(404);
        };
        $staff_id = Auth::user()->staff->id;
    }


    public function departmentCourses($department_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Department Courses']);
        $id = SRS::decode($department_id)[0];

        $data['id'] = $department_id;
        $dep = Department::find($id);
        //dd($dep,$id);
        $data['department'] = $dep;
        return view('dashboard.settings.courses.index', $data);
    }

    public function GetCourses()
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Courses']);

        return view('dashboard.settings.courses.index', $data);
    }


    public function getJsonCourses()
    {
        if (!Gate::allows('courses-view')) {
            return abort(401);
        }
        // $id = SRS::decode($department_id)[0];
        $courses = Course::all();
        return DataTables::of($courses)
            ->addIndexColumn()
            ->addColumn('action', function ($c) {
                $edit_link = "";
                $delete_link = "";
                $profile_link = "";
                if (Gate::allows('courses-edit')) {
                    $edit_link = link_to(route('courses.edit', [SRS::encode($c->id)]), '<i class="fa fa-edit" aria-hidden="true"></i>');
                }
                if (Gate::allows('courses-delete')) {
                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Course") . "</b>' data-content=\"<p>"
                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('courses.destroy', SRS::encode($c->id)) . "'>"
                        . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o \" style=\"color:red\"></i></a> ";
                }


                return html_entity_decode($edit_link) . html_entity_decode($delete_link);
            })
            ->make(true);
    }

    public function GetModuleList()
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Courses']);

        return view('dashboard.settings.courses.module_assign_index', $data);
    }

    public function getJsonModuleList()
    {
        if (!Gate::allows('courses-view')) {
            return abort(401);
        }
        // $id = SRS::decode($department_id)[0];
        $courses = Course::all();
        return DataTables::of($courses)
            ->addIndexColumn()
            ->addColumn('action', function ($c) {
                $profile_link = "";

                $profile_link = link_to(route('courses.config.course-details', [SRS::encode($c->id)]), "<button class='badge badge-xs btn-primary'>" . "Assign Staff". "</button>   ");

                return html_entity_decode($profile_link);
            })
            ->make(true);
    }


    public function getJsonDepartmentCourses($department_id)
    {
        if (!Gate::allows('courses-view')) {
            return abort(401);
        }
        $id = SRS::decode($department_id)[0];
        $courses = Course::where('department_id',  $id);
        return DataTables::of($courses)
            ->addIndexColumn()
            ->addColumn('action', function ($c) use ($id) {
                $edit_link = "";
                $delete_link = "";
                $profile_link = "";
                if (Gate::allows('courses-edit')) {
                    $edit_link = link_to(route('courses.edit', [SRS::encode($c->id), SRS::encode($c->department_id)]), '<i class="fa fa-edit" aria-hidden="true"></i>');
                }
                if (Gate::allows('courses-delete')) {
                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Course") . "</b>' data-content=\"<p>"
                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('courses.destroy', SRS::encode($c->id)) . "'>"
                        . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o \"></i></a>";
                }

                //$profile_link = link_to(route('courses.course-profile', SRS::encode($c->id)), '<i class="mdi mdi-face-profile " aria-hidden="true"></i>');

                $profile_link = link_to(route('courses.config.course-details', [SRS::encode($c->id), SRS::encode($id)]), '<i class="fa-fw fa fa-cogs" aria-hidden="true"></i>');

                return html_entity_decode($profile_link) . html_entity_decode($edit_link) . html_entity_decode($delete_link);
            })
            ->make(true);
    }

    public function getJsonConfigDepartmentCourses($department_id)
    {
        $id = SRS::decode($department_id)[0];
        $courses = Course::where('department_id', $id);
            
        return DataTables::of($courses)
            ->addIndexColumn()
            ->addColumn('action', function ($c) {
                $edit_link = link_to(route('courses.edit', [SRS::encode($c->id), SRS::encode($c->department_id)]), '<i class="fa fa-edit p-2" aria-hidden="true"></i>');
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Course") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('courses.destroy', SRS::encode($c->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
                    . trans('Delete') . "</a>";

                $profile_link = link_to(route('courses.course-profile', SRS::encode($c->id)), '<i class="mdi mdi-face-profile  p-2" aria-hidden="true"></i>');
                return html_entity_decode($profile_link) . html_entity_decode($edit_link) . html_entity_decode($delete_link);
            })
            ->make(true);
    }

    public function courseProfile($course_id)
    {
        try {
            $id = SRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::where('courses.id', $id)->with(['study_level', 'department.faculty.institution'])->first();

        //dd($course->department->faculty->campus->institution);
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Course Profile']);
        $data['course'] = $course;
        return view('dashboard.settings.courses.index_course_profile', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_course()
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Create Course']);

        // if (!empty(SRS::decode($department_id))) {
        //     $id = SRS::decode($department_id)[0];
        // } else {
        //     return back()->with('error', 'You try to by pass');
        // };


        $data['score_type'] = [
            '' => '',
            'Mark' => 'Mark',
            'Grade' => 'Grade',
        ];
        $data['pass_grade'] = [
            '' => '',
            'A' => 'A',
            'B+' => 'B+',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
            'E' => 'E'
        ];
        $data['course_works'] = [
            '' => '',
            '0' => '0',
            '40' => '40',
            '50' => '50',
            '60' => '60',
            '100' => '100'
        ];
        $data['minimum_course_work'] = [
            '' => '',
            '0' => '0',
            '16' => '16',
            '20' => '20',
            '25' => '25',
            '27' => '27',
            '30' => '30',
        ];
        $data['minimum_ue'] = [
            '' => '',
            '0.00' => '0',
            '16.00' => '16',
            '18.00' => '18',
            '20.00' => '20',
            '24.00' => '24',
            '25.00' => '25',
            '26.00' => '26',
            '27.00' => '27',
            '30.00' => '30',
            '33.00' => '33',
            '40.00' => '40',
            '50.00' => '50',
            '60.00' => '60',
        ];

        $data['course_category'] = [
            '' => '',
            // 'Undergraduate Course' => 'Undergraduate Course',
            // 'Graduate Course' => 'Graduate Course',

            'Certificate Module' => 'Certificate Module',
            'Diploma Module' => 'Diploma Module',
            'Bachelor Module' => 'Bachelor Module',
            'Masters Module' => 'Masters Module',
        ];

        $data['course_status'] = [
            '' => '',
            '1' => 'With Practical', /// with practical
            '0' => 'Without Practical',  /// without practical

        ];

        $study_levels[''] = '';
        $s_levels = StudyLevel::all();
        foreach ($s_levels as $l) {
            $study_levels[$l->id] = $l->level_name;
        }
        $data['study_levels'] = $study_levels;
        // $data['dep_id'] = $department_id;
        // $data['department'] = Department::find($id);
        return view('dashboard.settings.courses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'department_id' => 'required',
            //'year_id'      =>'required',
            'course_code' => 'required',
            'course_name' => 'required',
            // 'course_category' => 'required',
            // 'min_cw' => 'required',
            'score_type' => 'required',
            'study_level_id' => 'required',
            'pass_grade' => 'required',
            // 'unit' => 'required',
            // 'cw' => 'required',
            // 'course_status' => 'required',
            //'final'          =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $input['year_id'] = Auth::user()->staff->year_id;
        // $input['department_id'] = SRS::decode($input['department_id'])[0];
        
        $code = $input['course_code'];
        // $d_id = $input['department_id'];
        $check_course_code = DB::table('courses')
            // ->join('departments', 'departments.id', '=', 'courses.department_id')
            // ->where('courses.department_id', '=', $d_id)
            ->where(function ($query) use ($code) {
                $query->where('courses.course_code', '=', $code);
                // $query->where('courses.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();
        try {
            if (count($check_course_code) > 0) {
                return back()->withInput()->with('error', 'Course Already Exist');
            } else {
                Course::create($input);
            }
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong =' . $e->getMessage());
        }
        return back()->with('message', 'Course Added Successfully !!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Create Course']);
        $data['score_type'] = [
            '' => '',
            'Mark' => 'Mark',
            'Grade' => 'Grade',
        ];
        $data['pass_grade'] = [
            '' => '',
            'A' => 'A',
            'B+' => 'B+',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
            'E' => 'E'
        ];
        $data['course_works'] = [
            '' => '',
            '0.00' => '0',
            '40.00' => '40',
            '50.00' => '50',
            '60.00' => '60',
            '100.00' => '100'
        ];
        $data['min_cw'] = [
            '' => '',
            '0.00' => '0',
            '16.00' => '16',
            '20.00' => '20',
            '25.00' => '25',
            '27.00' => '27',
            '30.00' => '30',
            '40.00' => '40',
            '50.00' => '50',

        ];
        $data['minimum_ue'] = [
            '' => '',
            '0.00' => '0',
            '16.00' => '16',
            '18.00' => '18',
            '20.00' => '20',
            '24.00' => '24',
            '25.00' => '25',
            '26.00' => '26',
            '27.00' => '27',
            '30.00' => '30',
            '33.00' => '33',
            '40.00' => '40',
            '50.00' => '50',
            '60.00' => '60',
        ];

        $data['course_category'] = [
            '' => '',
            'Certificate Module' => 'Certificate Module',
            'Diploma Module' => 'Diploma Module',
            'Bachelor Module' => 'Bachelor Module',
            'Masters Module' => 'Masters Module',

        ];

        $data['course_status'] = [
            '' => '',
            '1' => 'With Practical', /// with practical
            '0' => 'Without Practical',  /// without practical

        ];


        $study_levels[''] = '';
        $s_levels = StudyLevel::all();
        foreach ($s_levels as $l) {
            $study_levels[$l->id] = $l->level_name;
        }
        // $departments[''] = '';
        // $deps = Department::all();
        // foreach ($deps as $dep) {
        //     $departments[$dep->id] = $dep->department_name;
        // }
        $id = SRS::decode($course_id)[0];
        $course = Course::find($id);
        $data['study_levels'] = $study_levels;
        // $data['departments'] = $departments;
        $data['course'] = $course;

        return view('dashboard.settings.courses.edit', $data);
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
        $input = $request->all();
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        };
        $validator = Validator::make($input, [
            // 'department_id' => 'required',
            //'year_id'      =>'required',
            'course_code' => 'required',
            'course_name' => 'required',
            // 'course_category' => 'required',
            // 'min_cw' => 'required',
            'score_type' => 'required',
            'study_level_id' => 'required',
            'pass_grade' => 'required',
            // 'unit' => 'required',
            // 'cw' => 'required',
            // 'min_ue' => 'required',
            // 'course_status' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        $input['year_id'] = Auth::user()->staff->year_id;
        //$input['department_id'] = SRS::decode($input['department_id'])[0];
        // if ($input['cw'] == 40) {
        //     $input['cw'] = 40;
        //     $input['ue'] = 60;
        // } else if ($input['cw'] == 45) {
        //     $input['cw'] = 45;
        //     $input['ue'] = 55;
        // } else if ($input['cw'] == 50) {
        //     $input['cw'] = 50;
        //     $input['ue'] = 50;
        // } else if ($input['cw'] == 60) {
        //     $input['cw'] = 60;
        //     $input['ue'] = 40;
        // } else if ($input['cw'] == 0) {
        //     $input['cw'] = 0;
        //     $input['ue'] = 100;
        // } else if ($input['cw'] == 100) {
        //     $input['cw'] = 100;
        //     $input['ue'] = 0;
        // }

        // $input['final'] = $input['ue'];
        // $input['min_ue'] = $input['min_ue'];
        //  dd($input);
        try {
            Course::find($id)->update($input);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong =' . $e->getMessage());
        }
        return back()->with('message', 'Course Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id)
    {
        $id = SRS::decode($course_id)[0];

        Course::destroy($id);
        return response()->json('Course Deleted Successfully');
    }



    public function exam_scorecheck()
    {

        $data = ExamScore::all();
        $student = CourseStudent::all();

        foreach ($student as $s) {
            foreach ($data as $d) {

                if ($d->course_id == $s->course_id && $d->reg_no == $s->reg_no && $d->ese >= 50.0) {


                    ExamScore::where('reg_no', $d->reg_no)->where('course_id', $d->course_id)->update([
                        'exam_remark' => 'PASS'
                    ]);
                } elseif ($d->course_id == $s->course_id && $d->reg_no == $s->reg_no && $d->ese < 50.0) {

                    ExamScore::where('reg_no', $d->reg_no)->where('course_id', $d->course_id)->update([
                        'exam_remark' => 'SUPP'
                    ]);
                } elseif ($d->course_id == $s->course_id && $d->reg_no == $s->reg_no && empty($d->ese)) {

                    ExamScore::where('reg_no', $d->reg_no)->where('course_id', $d->course_id)->update([
                        'exam_remark' => 'INC'
                    ]);
                }
            }
        }

        return 'ok';
    }


    public function checknullese()
    {
        $data = ExamScore::all();
        foreach ($data as $d) {

            if (empty($d->ese)) {


                ExamScore::where('reg_no', $d->reg_no)->where('course_id', $d->course_id)->update([
                    'exam_remark' => 'INC'
                ]);
            }
        }
    }
}
