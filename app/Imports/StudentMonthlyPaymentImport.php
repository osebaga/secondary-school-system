<?php

namespace App\Imports;

use App\Models\AcademicYear;
use App\Models\StudentBill;
use App\Models\StudentMonthlyPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentMonthlyPaymentImport implements
    ToCollection,
    WithHeadingRow,
    ShouldQueue,
    WithChunkReading
{
    use Queueable;

    protected $accountYearId;
    protected $programmeCode;
    protected $ntaLevelId;
    protected $billDate;

    public function __construct($accountYearId, $programmeCode, $ntaLevelId, $billDate)
    {
        $this->accountYearId = $accountYearId;
        $this->programmeCode = $programmeCode;
        $this->ntaLevelId = $ntaLevelId;
        $this->billDate = $billDate;
    }

    public function collection(Collection $rows)
    {
        $accountYear = AcademicYear::find($this->accountYearId)->year;

        foreach ($rows as $row) {
            $regNo = $row['RegNo'];
            $amountPaid = $row['Amount'];
            $billMonth = Carbon::parse($this->billDate)->format('M');
            $importedDate = Carbon::parse($this->billDate)->format('Y-m-d');

            // Save payment
            StudentMonthlyPayment::create([
                'reg_no' => $regNo,
                'amount' => $amountPaid,
                'full_name' => $row['FullName'],
                'fee_name' => $row['FeeName'],
                'month_payment' => $billMonth,
                'account_year' => $accountYear,
                'prog_code' => $this->programmeCode,
                'nta_level' => $this->ntaLevelId,
                'imported_date' => $importedDate,
            ]);

            // Apply payment to oldest bills first
            $remaining = $amountPaid;

            $bills = StudentBill::where('reg_no', $regNo)
                ->where('bill_amount_remained', '>=', 0)
                ->orderBy('bill_date', 'asc')
                ->get();

            foreach ($bills as $bill) {
                if ($remaining <= 0) break;

                $deduct = min($bill->bill_amount_remained, $remaining);
                $bill->bill_amount_remained -= $deduct;
                $bill->save();

                $remaining -= $deduct;

                // Check for overpayment
                if ($remaining > 0) {
                    // Store the overpaid amount as a negative value in bill_amount_remained
                    $overpaidAmount = abs($remaining); // Convert to positive for clarity

                    // Update the first bill with the negative overpaid amount
                    $firstBill = $bills->first(); // Get the first bill from the collection
                    if ($firstBill) {
                        $firstBill->bill_amount_remained = - ($overpaidAmount); // Apply the negative overpayment
                        // dd($firstBill->bill_amount_remained);
                        $firstBill->save();
                    }
                } elseif ($remaining < 0) {
                    // Store the overpaid amount as a negative value in bill_amount_remained
                    $overpaidAmount = abs($remaining); // Convert to positive for clarity

                    // Update the first bill with the negative overpaid amount
                    $firstBill = $bills->first(); // Get the first bill from the collection
                    if ($firstBill) {
                        $firstBill->bill_amount_remained = - ($overpaidAmount); // Apply the negative overpayment
                        // dd($firstBill->bill_amount_remained);
                        $firstBill->save();
                    }
                }
            }
        }
    }

    public function chunkSize(): int
    {
        return 100; // Tune this depending on performance
    }
}
