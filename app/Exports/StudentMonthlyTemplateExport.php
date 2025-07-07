<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentMonthlyTemplateExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'S/N',
            'RegNo',
            'FullName',
            'FeeName',
            'Amount'
        ];
    }
}
