<?php

namespace App\Exports;

use App\Models\AcademicYear;
use App\Models\CourseProgram;
use App\Models\Program;
use App\Models\Course;
use App\Models\Student;
use App\Models\CourseStudent;
use App\Models\CombinationCourse;
use App\Models\Semester;
use App\Models\StudentClass;
use App\Models\AnnualResult;
use App\Models\AnnualResultSummary;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AnnualReport implements FromView, WithEvents, ShouldAutoSize
{
    public $request;

    /**
     * __construct
     *
     * @param  mixed $request
     * @return void
     */
    function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * registerEvents
     *
     * @return array
     */
    public function registerEvents(): array
    {
        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'text-align' => 'center',
        ];

        return [
            AfterSheet::class => function (AfterSheet $event) use ($headerStyle) {
                $event->sheet
                    ->getDelegate()
                    ->getStyle('A1')
                    ->applyFromArray($headerStyle);
            },
        ];
    }

    public function view(): View
    {
        if ($this->request->combination) {
            if ($this->request->combination == 'all') {
                $data['students'] = StudentClass::where('program_id', $this->request->program)
                    //->where('year_of_study', $this->request->studyyear)
                    ->where('year_id', $this->request->ayear)
                    ->get();

                $malegender = Student::join('users', 'users.username', '=', 'students.reg_no')
                    ->where('users.gender', 'M')
                    //  ->where('students.year_of_study', $this->request->studyyear)
                    ->where('students.year_id', $this->request->ayear)
                    ->get();
                $femalegender = Student::join('users', 'users.username', '=', 'students.reg_no')
                    ->where('users.gender', 'F')
                    // ->where('students.year_of_study', $this->request->studyyear)
                    ->where('students.year_id', $this->request->ayear)
                    ->get();

                $coursesIds = CourseProgram::orderBy('semester')
                    ->where('program_id', $this->request->program)
                    // ->where('year_id',$this->request->ayear)
                    ->where('year', $this->request->studyyear)
                    ->pluck('course_id');

                $data['courses'] = Course::whereIn('id', $coursesIds)->get();

                $data['program'] = $this->request->program;

                $data['year_id'] = $this->request->ayear;

                $data['year'] = $this->request->studyyear;

                $data['annual_results'] = AnnualResult::where('year_id', $data['year_id'])
                    ->whereIn('reg_no', $data['students']->pluck('reg_no'))
                    ->where('year_of_study', $data['year'])
                    ->get();

                $data['fail_summaries'] = AnnualResultSummary::where('program_id', $data['program'])
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->first();

                $data['first_class_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'FIRST CLASS')
                    ->count();
                $data['first_class_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'FIRST CLASS')
                    ->count();
                $data['first_class_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'FIRST CLASS')
                    ->count();

                $data['upper_second_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'UPPER SECOND')
                    ->count();
                $data['upper_second_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'UPPER SECOND')
                    ->count();
                $data['upper_second_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'UPPER SECOND')
                    ->count();

                $data['lower_second_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'LOWER SECOND')
                    ->count();
                $data['lower_second_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'LOWER SECOND')
                    ->count();
                $data['lower_second_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'LOWER SECOND')
                    ->count();

                $data['pass_class_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'PASS')
                    ->count();
                $data['pass_class_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'PASS')
                    ->count();
                $data['pass_class_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                    ->where('year_id', $data['year_id'])
                    ->where('year_of_study', $data['year'])
                    ->where('classification', 'PASS')
                    ->count();

                switch ($this->request->studyyear) {
                    case '1':
                        $studyyear = 'First Year';
                        break;
                    case '2':
                        $studyyear = 'Second Year';
                        break;

                    case '3':
                        $studyyear = 'Third Year';
                        break;

                    default:
                        $studyyear = 'First Year';
                        break;
                }
                $data['studyyear'] = $studyyear;

                return view('dashboard.exports.annual_report', $data);
            } else {
                $courseIds = CombinationCourse::where('combination_id', $this->request->combination)
                    ->where('year_id', $this->request->ayear)
                    ->where('year_of_study', $this->request->studyyear)
                    ->pluck('course_id')
                    ->toArray();
                if ($courseIds) {
                    $data['courses'] = Course::whereIn('id', $courseIds)->get();

                    $regNos = CourseStudent::whereIn('course_id', $courseIds)
                        ->pluck('reg_no')
                        ->toArray();

                    $data['students'] = StudentClass::where('program_id', $this->request->program)
                        ->where('year_id', $this->request->ayear)
                        ->where('year_of_study', $this->request->studyyear)
                        ->whereIn('reg_no', $regNos)
                        ->get();

                    $malegender = Student::join('users', 'users.username', '=', 'students.reg_no')
                        ->where('users.gender', 'M')
                        //  ->where('students.year_of_study', $this->request->studyyear)
                        ->where('students.year_id', $this->request->ayear)
                        ->get();
                    $femalegender = Student::join('users', 'users.username', '=', 'students.reg_no')
                        ->where('users.gender', 'F')
                        // ->where('students.year_of_study', $this->request->studyyear)
                        ->where('students.year_id', $this->request->ayear)
                        ->get();

                    $data['program'] = $this->request->program;

                    $data['year_id'] = $this->request->ayear;

                    $data['year'] = $this->request->studyyear;

                    $data['annual_results'] = AnnualResult::where('year_id', $data['year_id'])
                        ->whereIn('reg_no', $data['students']->pluck('reg_no'))
                        ->where('year_of_study', $data['year'])
                        ->get();

                    $data['fail_summaries'] = AnnualResultSummary::where('program_id', $data['program'])
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->first();

                    $data['first_class_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'FIRST CLASS')
                        ->count();
                    $data['first_class_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'FIRST CLASS')
                        ->count();
                    $data['first_class_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'FIRST CLASS')
                        ->count();

                    $data['upper_second_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'UPPER SECOND')
                        ->count();
                    $data['upper_second_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'UPPER SECOND')
                        ->count();
                    $data['upper_second_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'UPPER SECOND')
                        ->count();

                    $data['lower_second_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'LOWER SECOND')
                        ->count();
                    $data['lower_second_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'LOWER SECOND')
                        ->count();
                    $data['lower_second_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'LOWER SECOND')
                        ->count();

                    $data['pass_class_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'PASS')
                        ->count();
                    $data['pass_class_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'PASS')
                        ->count();
                    $data['pass_class_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                        ->where('year_id', $data['year_id'])
                        ->where('year_of_study', $data['year'])
                        ->where('classification', 'PASS')
                        ->count();

                    switch ($this->request->studyyear) {
                        case '1':
                            $studyyear = 'First Year';
                            break;
                        case '2':
                            $studyyear = 'Second Year';
                            break;

                        case '3':
                            $studyyear = 'Third Year';
                            break;

                        default:
                            $studyyear = 'First Year';
                            break;
                    }
                    $data['studyyear'] = $studyyear;
                    return view('dashboard.exports.annual_report', $data);
                }
            }
        } else {
            $data['students'] = StudentClass::where('program_id', $this->request->program)
                //->where('year_of_study', $this->request->studyyear)
                ->where('year_id', $this->request->ayear)
                ->get();

            $malegender = Student::join('users', 'users.username', '=', 'students.reg_no')
                ->where('users.gender', 'M')
                //  ->where('students.year_of_study', $this->request->studyyear)
                ->where('students.year_id', $this->request->ayear)
                ->get();
            $femalegender = Student::join('users', 'users.username', '=', 'students.reg_no')
                ->where('users.gender', 'F')
                // ->where('students.year_of_study', $this->request->studyyear)
                ->where('students.year_id', $this->request->ayear)
                ->get();

            $coursesIds = CourseProgram::orderBy('semester')
                ->where('program_id', $this->request->program)
                // ->where('year_id',$this->request->ayear)
                ->where('year', $this->request->studyyear)
                ->pluck('course_id');

            $data['courses'] = Course::whereIn('id', $coursesIds)->get();

            $data['program'] = $this->request->program;

            $data['year_id'] = $this->request->ayear;

            $data['year'] = $this->request->studyyear;

            $data['annual_results'] = AnnualResult::where('year_id', $data['year_id'])
                ->whereIn('reg_no', $data['students']->pluck('reg_no'))
                ->where('year_of_study', $data['year'])
                ->get();

            $data['fail_summaries'] = AnnualResultSummary::where('program_id', $data['program'])
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->first();

            $data['first_class_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'FIRST CLASS')
                ->count();
            $data['first_class_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'FIRST CLASS')
                ->count();
            $data['first_class_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'FIRST CLASS')
                ->count();

            $data['upper_second_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'UPPER SECOND')
                ->count();
            $data['upper_second_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'UPPER SECOND')
                ->count();
            $data['upper_second_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'UPPER SECOND')
                ->count();

            $data['lower_second_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'LOWER SECOND')
                ->count();
            $data['lower_second_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'LOWER SECOND')
                ->count();
            $data['lower_second_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'LOWER SECOND')
                ->count();

            $data['pass_class_total'] = AnnualResult::whereIn('reg_no', $data['students']->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'PASS')
                ->count();
            $data['pass_class_male'] = AnnualResult::whereIn('reg_no', $malegender->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'PASS')
                ->count();
            $data['pass_class_female'] = AnnualResult::whereIn('reg_no', $femalegender->pluck('reg_no'))
                ->where('year_id', $data['year_id'])
                ->where('year_of_study', $data['year'])
                ->where('classification', 'PASS')
                ->count();

            switch ($this->request->studyyear) {
                case '1':
                    $studyyear = 'First Year';
                    break;
                case '2':
                    $studyyear = 'Second Year';
                    break;

                case '3':
                    $studyyear = 'Third Year';
                    break;

                default:
                    $studyyear = 'First Year';
                    break;
            }
            $data['studyyear'] = $studyyear;

            return view('dashboard.exports.annual_report', $data);
        }
    }
}
