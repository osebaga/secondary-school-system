<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\CourseStudent;
use App\Models\StudentClass;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use SRS;
Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet
        ->getDelegate()
        ->getStyle($cellRange)
        ->applyFromArray($style);
});
class SemisterExamCategoryExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithEvents, ShouldAutoSize, ShouldQueue
{
    protected $course,
        $i = 1,
        $intake_id;

    function __construct($course, $intake_id)
    {
        $this->course = $course;
        $this->intake_id = $intake_id;
        //   dd($course);
    }
    public function collection()
    {
        //$row = CourseStudent::where('course_id',$this->course->id)->get();
        $row = StudentClass::join('course_student', 'student_classes.reg_no', '=', 'course_student.reg_no')
            ->where('student_classes.intake_category_id', $this->intake_id)
            ->where('student_classes.year_id', FacadesAuth::user()->staff->year_id)
            ->where('course_student.course_id', $this->course->id)
            ->get();
        return $row;
    }

    //    public function query()
    //    {
    //        return Student::query();
    //    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                //dd($event->sheet->getDelegate()->getHighestRow('A1'));
                $event->sheet->getDelegate()->mergeCells('A1:G1');
                $event->sheet->getDelegate()->setCellValue('A1', Str::upper($this->course->course_name) . '(' . $this->course->course_code . ')');

            },
            AfterSheet::class => function (AfterSheet $event) {
                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],

                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFFFFFF'],
                        ],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                        'endColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],
                ];
                $event->sheet->styleCells('A1:G1', $styleArray);
            },
        ];
    }

    public function headings(): array
    {
        $SE_X = 'Score /' . $this->course->final;

        $header = ['S.NO', 'Registration No', 'Score'];

        return $header;
    }

    public function map($row): array
    {
        return [
            $this->i++,
            // $row->user->first_name . ' ' . $row->user->last_name,
            $row->reg_no,
        ];
    }

    public function title(): string
    {
        return 'Student Registered in -' . '(' . $this->course->course_code . ')';
    }
}
