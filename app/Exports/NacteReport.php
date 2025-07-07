<?php

namespace App\Exports;

use App\Models\AcademicYear;
use App\Models\CombinationCourse;
use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\CourseStudent;
use App\Models\Program;
use App\Models\Semester;
use App\Models\Student;
use App\Models\SemesterResult;
use App\Models\StudentClass;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class NacteReport implements FromView, WithEvents
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
                $event->sheet->getDelegate()->mergeCells('A1:N1');
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
                $data = Student::where('program_id', $this->request->program)
                    ->where('year_of_study', $this->request->studyyear)
                    ->get();
                $courses = CourseProgram::where('program_id', $this->request->program)
                    ->where('year_id', $this->request->ayear)
                    ->where('semester', $this->request->semester)
                    ->groupBy('course_id')
                    ->get();
                $semesterresults = SemesterResult::where('semester_id', $this->request->semester)->get();

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
                return view('dashboard.exports.nacte_report', [
                    'data' => $data,
                    'program' => Program::find($this->request->program)->program_name ?? '',
                    'level' => substr(Program::find($this->request->program)->program_code ?? '', -1),
                    'academic_year' => AcademicYear::find($this->request->ayear)->year ?? '',
                    'semister' => Semester::find($this->request->semester)->title ?? '',
                    'courses' => $courses,
                    'studyyear' => $studyyear,
                    'semesteresult' => $semesterresults,
                ]);
            }else{

                $courseIds = CombinationCourse::where('combination_id', $this->request->combination)
                    ->where('year_id', $this->request->ayear)
                    ->where('year_of_study', $this->request->studyyear)
                    ->where('semester', $this->request->semester)
                    ->pluck('course_id')
                    ->toArray();
                if ($courseIds) {

                    $courses = Course::whereIn('id', $courseIds)->get();

                    $regNos = CourseStudent::whereIn('course_id', $courseIds)
                        ->pluck('reg_no')
                        ->toArray();
                    $data = StudentClass::where('program_id', $this->request->program)
                        ->where('year_id', $this->request->ayear)
                        ->where('year_of_study', $this->request->studyyear)
                        ->whereIn('reg_no', $regNos)
                        ->get();

                    $semesterresults = SemesterResult::where('semester_id', $this->request->semester)->get();

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
                    return view('dashboard.exports.nacte_report', [
                        'data' => $data,
                        'program' => Program::find($this->request->program)->program_name ?? '',
                        'level' => substr(Program::find($this->request->program)->program_code ?? '', -1),
                        'academic_year' => AcademicYear::find($this->request->ayear)->year ?? '',
                        'semister' => Semester::find($this->request->semester)->title ?? '',
                        'courses' => $courses,
                        'studyyear' => $studyyear,
                        'semesteresult' => $semesterresults,
                    ]);
                }
            }
        }
        else {
            $data = Student::where('program_id', $this->request->program)
                ->where('year_of_study', $this->request->studyyear)
                ->get();
            $courses = CourseProgram::where('program_id', $this->request->program)
                ->where('year_id', $this->request->ayear)
                ->where('semester', $this->request->semester)
                ->groupBy('course_id')
                ->get();
            $semesterresults = SemesterResult::where('semester_id', $this->request->semester)->get();

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
            return view('dashboard.exports.nacte_report', [
                'data' => $data,
                'program' => Program::find($this->request->program)->program_name ?? '',
                'level' => substr(Program::find($this->request->program)->program_code ?? '', -1),
                'academic_year' => AcademicYear::find($this->request->ayear)->year ?? '',
                'semister' => Semester::find($this->request->semester)->title ?? '',
                'courses' => $courses,
                'studyyear' => $studyyear,
                'semesteresult' => $semesterresults,
            ]);
        }
    }
}
