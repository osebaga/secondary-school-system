<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentBillTemplateExport implements WithHeadings
{
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


