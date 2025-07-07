<?php

namespace App\Exports;

use App\Exports\Traits\HasAgeingBuckets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class AssumptionsExport implements FromCollection, WithTitle, WithHeadings, WithEvents
{
    use HasAgeingBuckets;



    public function collection()
    {
        return collect($this->ageingBuckets())->map(function ($bucket) {
            return [
                'Buckets' => $bucket . ' Days',
            ];
        });
    }

    public function title(): string
    {
        return 'Assumptions';
    }

    public function headings(): array
    {
        return ['Buckets'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $rowCount = $sheet->getDelegate()->getHighestRow();

                // Column widths
                $sheet->getDelegate()->getColumnDimension('A')->setWidth(25);

                // Bold header + background
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'E0E0E0']
                    ]
                ]);

                // Borders for data only
                // Borders for column A only
                $sheet->getStyle("A2:A{$rowCount}")->applyFromArray([
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN]
                    ]
                ]);


                // Freeze header
                $sheet->freezePane('A2');
            },
        ];
    }
}
