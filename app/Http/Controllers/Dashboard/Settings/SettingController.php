<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\CourseProgram;
use App\Models\CourseStudent;
use App\Models\CourseWork;
use App\Models\Faculty;
use App\Models\IntakeCategory;
use App\Models\Result;
use App\Models\Student;
use App\Models\UeQuestion;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Validator;
use Bouncer;
class SettingController extends Controller
{
    function __construct()
    {

    }

    public function index()
    {
        if (!Gate::allows('settings-view')) {
            return abort(401);
        }

        $bc = array(array('link' => '#', 'page' => trans('app.dashboard')));

        return view('dashboard.settings.index', compact('bc'));
    }

    public function indexRegisterCoreSubjects()
    {
        if (! Gate::allows('courses-register_core_subjects')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile']);
        $data['semesters'] = [
            '' => '',
            '1' => 'One',
            '2' => 'Two',
        ];

        $data['years'] = [
            '' => '',
            '1' => 'First Year',
            '2' => 'Second Year',
            '3' => 'Third Year',
            '4' => 'Fourth Year',
            '5' => 'Fifth Year',
        ];
        $intakes[''] = '';
        $intake_all = IntakeCategory::all();
        foreach ($intake_all as $intake) {

            $intakes[$intake->id] = $intake->name;
        }
        $campuses[''] = '';
        $campus_all = Campus::all();
        foreach ($campus_all as $campus) {
            $campuses[$campus->id] = $campus->campus_name;
        }
        $data['intakes'] = $intakes;
        $data['campuses'] = $campuses;
        return view('dashboard.settings.student_core_subject_registration', $data);

    }

    public function registerCoreSubject(Request $request)
    {
        if (! Gate::allows('courses-register_core_subjects')) {
            return abort(401);
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'year' => 'required',
            'semester' => 'required',
            'intake_category_id' => 'required',
            'campus_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('error', $validator->errors());
        }
        $intake_category_id= $input['intake_category_id'];
        $campus_id = $input['campus_id'];
        $year = $input['year'];

        $students_collec = DB::table('students')
            ->where('year_id', '=', Auth::user()->staff->year_id)
            ->where(function ($query) use ($intake_category_id, $campus_id, $year) {
                $query->where('intake_category_id', '=', $intake_category_id);
                $query->where('campus_id', '=', $campus_id);
                $query->where('year_of_study', '=', $year);
            })
            ->get();

        $students = Student::join('student_years as class',function ($join){
            $join->on('class.reg_no','=','students.reg_no')
            ->where('year_id','=',Auth::user()->staff->year_id);
        })->where('intake_category_id', '=', $intake_category_id);

        $students = array();
        DB::beginTransaction();
        try {
            foreach ($students_collec as $std) {
                $student_id = $std->id;
                $reg_no = $std->reg_no;
                $program_id = $std->program_id;
                $course_program = CourseProgram::academicYear()->programId($program_id)->
                where('year', '=', $input['year'])
                    ->where('semester', '=', $input['semester'])
                    ->where('core', '=', 1)
                    ->get();
//                dd($course_program);
                foreach ($course_program as $cp) {
                    $course_id = $cp->course_id;
                    $p_id = $cp->program_id;
                    $year_id = $cp->year_id;
                    $year = $cp->year;
                    $semester = $cp->semester;
                    $where = [
                        'student_id' => $student_id,
                        'reg_no' => $reg_no,
                        'year_id' => $year_id,
                        'semester' => $semester,
                        'course_id' => $course_id,
                    ];
                    $course = CourseStudent::updateOrCreate($where, ['course_id' => $course_id]);
                    $courseStudentIds[] = $course->course_id;
                }
                $where2 = [
                    'reg_no' => $reg_no,
                    'year_id' => $year_id,
                    'semester' => $semester,

                ];

                CourseStudent::where($where2)->whereNotIn('course_id', $courseStudentIds)->delete();
            }
            DB::Commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error=' . $e->getMessage());
        }
        return back()->with('message', 'successfully! All student information processed');

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Setting $setting)
    {
        //
    }

    public function edit(Setting $setting)
    {
        //
    }


    public function update(Request $request, Setting $setting)
    {
        //
    }


    public function destroy(Setting $setting)
    {
        //
    }
}
