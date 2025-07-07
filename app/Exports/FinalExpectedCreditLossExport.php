<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class FinalExpectedCreditLossExport implements WithMultipleSheets
{
    protected $bills;
    protected $monthEndDate;

    public function __construct($bills, $monthEndDate)
    {
        $this->bills = $bills;
        $this->monthEndDate = $monthEndDate;
    }

    public function sheets(): array
    {
        return [
            new AssumptionsExport(),
            new LossRateComputationExport(),
            new DegreeAgeingReportExport($this->bills, $this->monthEndDate),
        ];
    }
}
