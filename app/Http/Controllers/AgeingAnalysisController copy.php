<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AgeingAnalysisController extends Controller
{
    public function ageingReport(Request $request)
    {
        $data['bc'] = [
            ['link' => '#', 'page' => 'Dashboard'],
            ['link' => '#', 'page' => 'Ageing Analysis']
        ];

        $academicYears = AcademicYear::all();
        $programmes = Program::all();
        $bills = collect();

        if ($request->filled(['academic_year', 'program_code', 'month_end_date'])) {
            $accountYear = $request->input('academic_year');
            $progCode = $request->input('program_code');

            $quarter = $request->input('month_end_date');
            $startYear = (int) explode('/', $accountYear)[0];

            switch ($quarter) {
                case 'Q1':
                    $monthEndDate = Carbon::createFromDate($startYear, 9, 30);
                    break;
                case 'Q2':
                    $monthEndDate = Carbon::createFromDate($startYear, 12, 31);
                    break;
                case 'Q3':
                    $monthEndDate = Carbon::createFromDate($startYear + 1, 3, 31);
                    break;
                case 'Q4':
                    $monthEndDate = Carbon::createFromDate($startYear + 1, 6, 30);
                    break;
                default:
                    $monthEndDate = now();
            }
            $monthEndDate = $monthEndDate->format('Y-m-d');

            // Update remained balance before generating report
        DB::statement("
        UPDATE student_bills b
        JOIN (
            SELECT reg_no, SUM(amount) as total_paid
            FROM student_monthly_payments
            GROUP BY reg_no
        ) p ON b.reg_no = p.reg_no
        SET b.bill_amount_remained = GREATEST(b.amount - p.total_paid, 0)
        WHERE b.account_year = ? AND b.prog_code = ?
        ", [$accountYear, $progCode]);


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

        }

        $data['bills'] = $bills;
        $data['academicYears'] = $academicYears;
        $data['programmes'] = $programmes;
        $data['request'] = $request;

        return view('student_import_bills.ageing_analysis', $data);
    }
}
