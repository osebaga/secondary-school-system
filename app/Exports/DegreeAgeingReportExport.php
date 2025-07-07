<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithTitle,
    WithStyles,
    WithEvents,
    WithColumnFormatting,
    WithColumnWidths
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use App\Exports\Traits\HasAgeingBuckets;


class DegreeAgeingReportExport implements FromCollection, WithHeadings, WithStyles, WithEvents, WithColumnFormatting, WithColumnWidths,WithTitle
{
    use HasAgeingBuckets;

    protected $bills;
    protected $monthEndDate;
    public function __construct($bills, $monthEndDate)
    {
        $this->bills = $bills;
        $this->monthEndDate = $monthEndDate;
    }

    // public function collection()
    // {
    //     return $this->bills->map(function ($item) {
    //         return [
    //             'reg_no' => $item->reg_no,
    //             'full_name' => $item->full_name,
    //             'consumer_type' => 'STUDENT',
    //             'month_end_date' => Carbon::parse($this->monthEndDate)->format('d-M-Y'),
    //             'total_balance' => $item->total_balance,
    //             '0 - 90' => $item->range_0_90,
    //             '91 - 180' => $item->range_91_180,
    //             '181 - 270' => $item->range_181_270,
    //             '271 - 365' => $item->range_271_365,
    //             '365 - 450' => $item->range_366_450,
    //             '451 - 540' => $item->range_451_540,
    //             '541 - 630' => $item->range_541_630,
    //             '631 - 720' => $item->range_631_720,
    //             '721 - 810' => $item->range_721_810,
    //             '811 - 900' => $item->range_811_900,
    //             '901 - 990' => $item->range_901_990,
    //             '991 - 1080' => $item->range_991_1080,
    //             'Above 1080' => $item->range_above_1080,
    //         ];
    //     });
    // }
    public function collection()
    {
        return $this->bills->map(function ($item) {
            $row = [
                'reg_no' => $item->reg_no,
                'full_name' => $item->full_name,
                'consumer_type' => 'STUDENT',
                'month_end_date' => Carbon::parse($this->monthEndDate)->format('d-M-Y'),
                'total_balance' => $item->total_balance,
            ];

            foreach ($this->ageingBuckets() as $bucket) {
                $key = str_replace(' ', '_', strtolower($bucket));
                $row[$bucket] = $item->{'range_' . str_replace([' - ', 'Above '], ['_', 'above_'], $bucket)};
            }

            return $row;
        });
    }
    public function headings(): array
    {
        // return [
        //     'Unique ID',
        //     'Customer Name',
        //     'Customer Type',
        //     'Month End Date',
        //     'Total Balance',
        //     '0 - 90 Days',
        //     '91 - 180 Days',
        //     '181 - 270 Days',
        //     '271 - 365 Days',
        //     '366 - 450 Days',
        //     '451 - 540 Days',
        //     '541 - 630 Days',
        //     '631 - 720 Days',
        //     '721 - 810 Days',
        //     '811 - 900 Days',
        //     '901 - 990 Days',
        //     '991 - 1080 Days',
        //     'Above 1080 Days',
        // ];
        return array_merge([
            'Unique ID',
            'Customer Name',
            'Customer Type',
            'Month End Date',
            'Total Balance',
        ], array_map(fn($bucket) => "{$bucket} Days", $this->ageingBuckets()));

    }

    public function columnWidths(): array
    {
        return [
            'A' => 20, // Unique ID
            'B' => 30, // Customer Name
            'C' => 15, // Customer Type
            'D' => 20, // Month End Date
            'E' => 18, // Total Balance
            'F' => 15, // 0 - 90
            'G' => 15, // 91 - 180
            'H' => 15, // 181 - 270
            'I' => 15, // 271 - 365
            'J' => 15, // 366 - 450
            'K' => 15, // 451 - 540
            'L' => 15, // 541 - 630
            'M' => 15, // 631 - 720
            'N' => 15, // 721 - 810
            'O' => 15, // 811 - 900
            'P' => 15, // 901 - 990
            'Q' => 15, // 991 - 1080
            'R' => 15, // Above 1080
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $startRow = 2;
                $endRow = count($this->bills) + 1; // since header is row 1
                $totalRow = $endRow + 1;

                // Loop through each row and set formula in column E to sum F to R
                for ($row = $startRow; $row <= $endRow; $row++) {
                    $event->sheet->setCellValue("E{$row}", "=SUM(F{$row}:R{$row})");
                }

                // Then, in the totalRow (E), sum all calculated E values (E2 to E{endRow})
                $event->sheet->setCellValue("E{$totalRow}", "=SUM(E{$startRow}:E{$endRow})");

                // Optionally: Bold the total cell
                $event->sheet->getStyle("E{$totalRow}")->getFont()->setBold(true);
                $event->sheet->getStyle("E{$totalRow}")->getNumberFormat()->setFormatCode('#,##0.00');

                // Optionally: Add a label in column D
                $event->sheet->setCellValue("D{$totalRow}", "Total Balance:");
                $event->sheet->getStyle("D{$totalRow}")->getFont()->setBold(true);

                $sheet = $event->sheet->getDelegate();

                $rowCount = $sheet->getHighestRow();

                // Freeze header
                $sheet->freezePane('A2');
                // Apply borders only to data rows (row 2 to rowCount - 1, assuming last row is total)
                $dataRange = 'A2:R' . ($rowCount - 1);

                $sheet->getStyle($dataRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // Format number columns (E to R)
                for ($col = 'E'; $col <= 'R'; $col++) {
                    $sheet->getStyle("{$col}2:{$col}" . ($rowCount - 1))->getNumberFormat()
                        ->setFormatCode('#,##0');
                }
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Bold headers and add borders to header row
            1 => [
                'font' => ['bold' => true],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
        ];
    }

    public function columnFormats(): array
    {
        // Format numeric columns (E to R)
        return [
            'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'M' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'P' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'R' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }


    public function title(): string
    {
        return Carbon::parse($this->monthEndDate)->format('F Y');
    }
}
