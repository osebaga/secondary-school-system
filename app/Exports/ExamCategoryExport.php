<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
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

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});
class ExamCategoryExport implements  WithHeadings, WithMapping, WithTitle, WithEvents, ShouldAutoSize, ShouldQueue
{
    protected $course;
    function __construct($course)
    {
        $this->course = $course;

    }
    public function collection()
    {
        return Student::all();
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
                $event->sheet->getDelegate()->mergeCells('A1:E1');
                $event->sheet->getDelegate()->setCellValue('A1', 'EXAM CATEGORY RESULT FOR ' . Str::upper($this->course->course_name) . '(' . $this->course->course_code . ')');

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
        $SE_X = "Score /" . $this->course->final;

        $header = [
            '#',
            'REG. NO.',
            'Score',
        ];

        return $header;
    }

    public function map($row): array
    {
        return [];
    }

    public function title(): string
    {
        return 'EXAM CATEGORY RESULT FOR' . '(' . $this->course->course_code . ')';
    }

}
