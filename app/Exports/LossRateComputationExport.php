<?php
namespace App\Exports;

use App\Exports\Traits\HasAgeingBuckets;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class LossRateComputationExport implements FromCollection, WithTitle, WithHeadings, WithEvents
{
    use HasAgeingBuckets;

    public function collection()
    {
        $rates = [
            '0 - 90' => 0.01,
            '91 - 180' => 0.02,
            '181 - 270' => 0.03,
            // ... rest of your logic
        ];

        return collect($this->ageingBuckets())->map(function ($bucket) use ($rates) {
            return [
                'Bucket' => $bucket . ' Days',
                'Rate' => $rates[$bucket] ?? 0.05,
            ];
        });
    }

    public function title(): string
    {
        return 'Loss Rate Computation';
    }

    public function headings(): array
    {
        return ['Buckets', 'Loss Rates'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $rowCount = $sheet->getDelegate()->getHighestRow();

                // Set column widths
                $sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $sheet->getDelegate()->getColumnDimension('B')->setWidth(15);

                // Bold headers + background
                $sheet->getStyle('A1:B1')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'E0E0E0']
                    ]
                ]);

                // Borders for data rows only (A2:B...)
                $sheet->getStyle("A2:B{$rowCount}")->applyFromArray([
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN]
                    ]
                ]);

                // Freeze first row
                $sheet->freezePane('A2');

                // Format Rate column as percentage
                $sheet->getStyle("B2:B{$rowCount}")->getNumberFormat()->setFormatCode('0.00');

            },
        ];
    }
}
