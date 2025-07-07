<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Program;
use App\Models\StudentBill;
use App\Models\StudentMonthlyPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AgeingAnalysisController extends Controller
{
    public function ageingReport(Request $request)
    {
        // dd($request->all());
       
        $data['bc'] = [
            ['link' => '#', 'page' => 'Dashboard'],
            ['link' => '#', 'page' => 'Ageing Analysis']
        ];

        $academicYears = AcademicYear::all();
        $programmes = Program::all();
        $bills = collect();

        if ($request->filled(['academic_year', 'program_code','ageing_type'])) {
            
            $accountYear = $request->input('academic_year');
            $progCode = $request->input('program_code');

            if ($request->ageing_type === 'month') {
                $monthEndDate = $request->input('month_date');
            } elseif ($request->ageing_type === 'quarter') {

                $quarterString = $request->input('quarter_date');
          
                $quarter = explode(' ', $quarterString)[0];
                
                $parts = explode(' ', $quarterString);
                $year = isset($parts[1]) ? (int) $parts[1] : null;
                
                $startYear = $year;

                switch ($quarter) {
                    case 'Q1':
                        $monthEndDate = Carbon::createFromDate($startYear, 9, 30);
                        break;
                    case 'Q2':
                        $monthEndDate = Carbon::createFromDate($startYear, 12, 31);
                        break;
                    case 'Q3':
                        $monthEndDate = Carbon::createFromDate($startYear, 3, 31);
                        break;
                    case 'Q4':
                        $monthEndDate = Carbon::createFromDate($startYear, 6, 30);
                        break;
                    default:
                        $monthEndDate = now();
                }
                $monthEndDate = $monthEndDate->format('Y-m-d');

            }

            
            // Update remained balance before generating report  
            // has been removed as was implemented in the student monthly payment import
          
          
            // StudentBill::where('account_year', $accountYear)
            //     ->where('prog_code', $progCode)
            //     ->select('reg_no')
            //     ->distinct()
            //     ->chunk(100, function ($studentsChunk) use ($accountYear, $progCode) {
            //         foreach ($studentsChunk as $student) {
            //             $bills = StudentBill::where('reg_no', $student->reg_no)
            //                 ->where('account_year', $accountYear)
            //                 ->where('prog_code', $progCode)
            //                 ->orderBy('bill_date')
            //                 ->get();

            //             $totalPaid = StudentMonthlyPayment::where('reg_no', $student->reg_no)->sum('amount');

            //             foreach ($bills as $bill) {
            //                 $billAmount = $bill->amount;

            //                 if ($totalPaid >= $billAmount) {
            //                     $bill->bill_amount_remained = 0;
            //                     $totalPaid -= $billAmount;
            //                 } else {
            //                     $bill->bill_amount_remained = $billAmount - $totalPaid;
            //                     $totalPaid = 0;
            //                 }

            //                 $bill->save();

            //                 if ($totalPaid <= 0) {
            //                     break;
            //                 }
            //             }

            //             // Optional: If bill_amount_remained wasn't set and totalPaid is 0, set it to full amount
            //             foreach ($bills as $bill) {
            //                 if (is_null($bill->bill_amount_remained)) {
            //                     $bill->bill_amount_remained = $bill->amount;
            //                     $bill->save();
            //                 }
            //             }
            //         }
            //     });

            $bills = DB::table('student_bills')
                ->select(
                    'reg_no',
                    DB::raw('SUM(bill_amount_remained) as total_balance'),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 0 AND 90 THEN bill_amount_remained ELSE 0 END) as range_0_90"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 91 AND 180 THEN bill_amount_remained ELSE 0 END) as range_91_180"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 181 AND 270 THEN bill_amount_remained ELSE 0 END) as range_181_270"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 271 AND 365 THEN bill_amount_remained ELSE 0 END) as range_271_365"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 366 AND 450 THEN bill_amount_remained ELSE 0 END) as range_366_450"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 451 AND 540 THEN bill_amount_remained ELSE 0 END) as range_451_540"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 541 AND 630 THEN bill_amount_remained ELSE 0 END) as range_541_630"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 631 AND 720 THEN bill_amount_remained ELSE 0 END) as range_631_720"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 721 AND 810 THEN bill_amount_remained ELSE 0 END) as range_721_810"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 811 AND 900 THEN bill_amount_remained ELSE 0 END) as range_811_900"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 901 AND 990 THEN bill_amount_remained ELSE 0 END) as range_901_990"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 991 AND 1080 THEN bill_amount_remained ELSE 0 END) as range_991_1080"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) > 1080 THEN bill_amount_remained ELSE 0 END) as range_above_1080")
                )
                ->where('account_year', $accountYear)
                ->where('prog_code', $progCode)
                ->groupBy('reg_no')
                ->get();
                
                if($bills->isEmpty()){
                    return redirect()->back()->with('error', 'No Bills Found for the selected filters, Please try again');
                }
        } 
            $monthEndDate1 = now();

            $monthEndDate = $monthEndDate1->format('Y-m-d');
            
            $bills = DB::table('student_bills')
                ->select(
                    'reg_no',
                    DB::raw('SUM(bill_amount_remained) as total_balance'),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 0 AND 90 THEN bill_amount_remained ELSE 0 END) as range_0_90"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 91 AND 180 THEN bill_amount_remained ELSE 0 END) as range_91_180"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 181 AND 270 THEN bill_amount_remained ELSE 0 END) as range_181_270"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 271 AND 365 THEN bill_amount_remained ELSE 0 END) as range_271_365"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 366 AND 450 THEN bill_amount_remained ELSE 0 END) as range_366_450"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 451 AND 540 THEN bill_amount_remained ELSE 0 END) as range_451_540"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 541 AND 630 THEN bill_amount_remained ELSE 0 END) as range_541_630"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 631 AND 720 THEN bill_amount_remained ELSE 0 END) as range_631_720"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 721 AND 810 THEN bill_amount_remained ELSE 0 END) as range_721_810"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 811 AND 900 THEN bill_amount_remained ELSE 0 END) as range_811_900"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 901 AND 990 THEN bill_amount_remained ELSE 0 END) as range_901_990"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 991 AND 1080 THEN bill_amount_remained ELSE 0 END) as range_991_1080"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) > 1080 THEN bill_amount_remained ELSE 0 END) as range_above_1080")
                )
                ->groupBy('reg_no')
                ->get();
        

        $data['bills'] = $bills;
        $data['academicYears'] = $academicYears;
        $data['programmes'] = $programmes;
        $data['request'] = $request;
        // dd($data['request']);
        return view('student_import_bills.ageing_analysis', $data);
    }
}
