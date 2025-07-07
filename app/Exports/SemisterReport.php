<?php

namespace App\Exports;

use App\Models\AcademicYear;
use App\Models\Combination;
use App\Models\CombinationCourse;
use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\CourseStudent;
use App\Models\Program;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\SemesterResult;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SemisterReport implements FromView, WithEvents, ShouldAutoSize
{
    public $request;

    function __construct($request)
    {
        $this->request = $request;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $headerStyle = [
                    'font' => [
                        'bold' => true,
                    ],
                    'text-align' => 'center',
                ];
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
                    ->get();

                $data['program_courses'] = Program::find($this->request->program)
                    ->courses->where('pivot.semester', $this->request->semester)
                    ->where('pivot.year_id', $this->request->ayear)
                    ->where('pivot.year', $this->request->studyyear);

                $data['ayear'] = $this->request->ayear;

                $data['semester_id'] = $this->request->semester ?? -1;

                $data['semester_title'] = Semester::find($this->request->semester)->title ?? '';

                $data['program_name'] = Program::find($this->request->program)->program_name ?? '';
                $data['program_code'] = Program::find($this->request->program)->program_code ?? '';
                $data['level'] = substr(Program::find($this->request->program)->program_code ?? '', -1);

                switch ($this->request->studyyear) {
                    case '1':
                        $studyyear_title = 'First Year';

                        break;
                    case '2':
                        $studyyear_title = 'Second Year';
                        break;

                    case '3':
                        $studyyear_title = 'Third Year';
                        break;

                    default:
                        $studyyear_title = 'First Year';
                        break;
                }
                $data['yearofstudy'] = $this->request->studyyear;
                $data['studyyear_title'] = $studyyear_title;

                return view('dashboard.exports.semister_report', $data);
            } else {
                $courseIds = CombinationCourse::where('combination_id', $this->request->combination)
                    ->where('year_id', $this->request->ayear)
                    ->where('year_of_study', $this->request->studyyear)
                    ->where('semester', $this->request->semester)
                    ->pluck('course_id')
                    ->toArray();

                if ($courseIds) {
                    $data['program_courses'] = Course::whereIn('id', $courseIds)->get();

                    $regNos = CourseStudent::whereIn('course_id', $courseIds)
                        ->pluck('reg_no')
                        ->toArray();

                    $data['students'] = StudentClass::where('program_id', $this->request->program)
                        ->where('year_id', $this->request->ayear)
                        ->where('year_of_study', $this->request->studyyear)
                        ->whereIn('reg_no', $regNos)
                        ->get();

                    $data['ayear'] = $this->request->ayear;

                    $data['semester_id'] = $this->request->semester ?? -1;

                    $data['semester_title'] = Semester::find($this->request->semester)->title ?? '';

                    $data['program_name'] = Program::find($this->request->program)->program_name ?? '';
                    $data['program_code'] = Program::find($this->request->program)->program_code ?? '';
                    $data['level'] = substr(Program::find($this->request->program)->program_code ?? '', -1);

                    switch ($this->request->studyyear) {
                        case '1':
                            $studyyear_title = 'First Year';

                            break;
                        case '2':
                            $studyyear_title = 'Second Year';
                            break;

                        case '3':
                            $studyyear_title = 'Third Year';
                            break;

                        default:
                            $studyyear_title = 'First Year';
                            break;
                    }
                    $data['yearofstudy'] = $this->request->studyyear;
                    $data['studyyear_title'] = $studyyear_title;

                    return view('dashboard.exports.semister_report', $data);
                }
            }
        } else {
            $data['students'] = StudentClass::where('program_id', $this->request->program)
                //->where('year_of_study', $this->request->studyyear)
                ->get();

            $data['program_courses'] = Program::find($this->request->program)
                ->courses->where('pivot.semester', $this->request->semester)
                ->where('pivot.year_id', $this->request->ayear)
                ->where('pivot.year', $this->request->studyyear);

            $data['ayear'] = $this->request->ayear;

            $data['semester_id'] = $this->request->semester ?? -1;

            $data['semester_title'] = Semester::find($this->request->semester)->title ?? '';

            $data['program_name'] = Program::find($this->request->program)->program_name ?? '';
            $data['program_code'] = Program::find($this->request->program)->program_code ?? '';
            $data['level'] = substr(Program::find($this->request->program)->program_code ?? '', -1);

            switch ($this->request->studyyear) {
                case '1':
                    $studyyear_title = 'First Year';

                    break;
                case '2':
                    $studyyear_title = 'Second Year';
                    break;

                case '3':
                    $studyyear_title = 'Third Year';
                    break;

                default:
                    $studyyear_title = 'First Year';
                    break;
            }
            $data['yearofstudy'] = $this->request->studyyear;
            $data['studyyear_title'] = $studyyear_title;

            //dd($this->request->studyyear);

            return view('dashboard.exports.semister_report', $data);
        }
    }
}
