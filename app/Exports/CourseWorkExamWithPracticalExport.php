<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
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
use SRS;
Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});
class CourseWorkExamWithPracticalExport implements FromCollection,WithHeadings, WithMapping, WithTitle, WithEvents, ShouldAutoSize, ShouldQueue
{
    protected $course,$i=1,$intake_id;
    function __construct($course,$intake_id)
    {
        $this->course = $course;
        $this->intake_id = $intake_id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
       // return Student::all();
       $row = Student::join('course_student','students.reg_no','=','course_student.reg_no')
       ->where('students.intake_category_id',$this->intake_id)
       ->where('students.class_year',Auth::user()->staff->year_id)
         ->where('course_student.course_id',$this->course->id)->get();
         return $row;

    }

        public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                //dd($event->sheet->getDelegate()->getHighestRow('A1'));
                $event->sheet->getDelegate()->mergeCells('A1:E1');
                $event->sheet->getDelegate()->setCellValue('A1', 'CA RESULT FOR ' . Str::upper($this->course->course_name) . '(' . $this->course->course_code . ')');

                //  $event->sheet->getDelegate()->setTitle($this->course);
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
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                        'endColor' => [
                            'argb' => '000000',
                        ],
                    ],
                ];
                $event->sheet->styleCells(
                    'A1:K1',
                    $styleArray

                );
            }
        ];


    }


    public function headings(): array
    {
        $SE_X = "Score /" . $this->course->cw;

        $header = [
            '#',
            'REG. NO.',
             'Ass1',
             'Ass2',
             'T1',
             'Prac1',
             'Prac2'
        ];

        return $header;
    }

    public function map($row): array
    {
        return [
            $this->i++,
           // $row->user->first_name . ' ' . $row->user->last_name,
           $row->reg_no
        ];
    }

    public function title(): string
    {
        return 'CA RESULT FOR' . '(' . $this->course->course_code . ')';
    }

    



}
