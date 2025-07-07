<?php

namespace App\Imports;

use App\Models\AcademicYear;
use App\Models\Program;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use App\Models\StudentBill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentBillImport implements
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

        foreach ($rows as $row) {
            $regNo = $row['RegNo'];
            $billAmount = $row['Amount'];
            $amount = $row['Amount'];
            $billDate = Carbon::parse($this->billDate)->format('Y-m-d');
            $academicYear = AcademicYear::where('id', $this->accountYearId)->first()->year;

            // Fetch negative balance bills
            $existingBills = StudentBill::where('reg_no', $regNo)
                ->where('bill_amount_remained', '<', 0)
                ->orderBy('bill_date') // optional: oldest first
                ->get();

            // Deduct sequentially from each overpaid bill
            foreach ($existingBills as $bill) {
                if ($amount <= 0) break; // nothing to deduct

                $overpayment = abs($bill->bill_amount_remained);
                $deduct = min($overpayment, $amount);

                $bill->bill_amount_remained += $deduct; // bring it toward zero

                $bill->save();

                $amount -= $deduct; // reduce the new amount by deduction 
            }

            // Now store the new bill with the remaining amount
            $billData = [
                'reg_no' => $regNo,
                'amount' => $billAmount,
                'bill_amount_remained' => $amount, // this is now adjusted
                'description' => $row['FeeName'],
                'full_name' => $row['FullName'],
                'fee_name' => $row['FeeName'],
                'account_year' => $academicYear,
                'prog_code' => $this->programmeCode,
                'prog_name' => Program::where('program_code', $this->programmeCode)->first()->program_name,
                'nta_level' => $this->ntaLevelId,
                'bill_date' => $billDate,
            ];

            $where = [
                'reg_no' => $regNo,
                'account_year' => $academicYear,
                'prog_code' => $this->programmeCode,
                'bill_date' => $billDate,
            ];

            $check_if_exist = StudentBill::where($where)->first();
            if (!$check_if_exist) {
                StudentBill::create($billData);
            } else {
                $check_if_exist->update($billData);
            }
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
