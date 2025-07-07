<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Program;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\DegreeAgeingReportExport;
use App\Exports\FinalExpectedCreditLossExport;
use Maatwebsite\Excel\Facades\Excel;

class AgeingAnalysisController extends Controller
{
    public function ageingReportBackup(Request $request)
    {
        // dd($request->all());

        $data['bc'] = [
            ['link' => '#', 'page' => 'Dashboard'],
            ['link' => '#', 'page' => 'Ageing Analysis']
        ];

        $academicYears = AcademicYear::all();
        $programmes = Program::all();
        $bills = collect();

        if ($request->filled(['academic_year', 'program_code', 'ageing_type'])) {

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

            $bills = DB::table('student_bills')
                ->select(
                    'reg_no',
                    DB::raw('SUM(bill_amount_remained) as total_balance'),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 0 AND 90 THEN bill_amount_remained ELSE 0 END) as range_0_90"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 91 AND 180 THEN bill_amount_remained ELSE 0 END) as range_91_180"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 181 AND 270 THEN bill_amount_remained ELSE 0 END) as range_181_270"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 271 AND 365 THEN bill_amount_remained ELSE 0 END) as range_271_365"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 365 AND 450 THEN bill_amount_remained ELSE 0 END) as range_365_450"),
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

            if ($bills->isEmpty()) {
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
                DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 365 AND 450 THEN bill_amount_remained ELSE 0 END) as range_365_450"),
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


    public function ageingReport(Request $request)
    {
        $data['bc'] = [
            ['link' => '#', 'page' => 'Dashboard'],
            ['link' => '#', 'page' => 'Ageing Analysis']
        ];

        $academicYears = AcademicYear::all();
        $programmes = Program::all();
        $bills = collect();
        $message = null; // Initialize message variable

        // Check if the filters are filled
        if ($request->filled(['academic_year', 'program_code', 'ageing_type'])) {
            $accountYear = $request->input('academic_year');
            $progCode = $request->input('program_code');

            // Determine the end date based on the ageing type
            $monthEndDate = $this->getMonthEndDate($request);

            // Query for bills with the specified filters
            $bills = DB::table('student_bills')
                ->select(
                    'reg_no',
                    'full_name',
                    DB::raw('SUM(bill_amount_remained) as total_balance'),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 0 AND 90 THEN bill_amount_remained ELSE 0 END) as range_0_90"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 91 AND 180 THEN bill_amount_remained ELSE 0 END) as range_91_180"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 181 AND 270 THEN bill_amount_remained ELSE 0 END) as range_181_270"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 271 AND 365 THEN bill_amount_remained ELSE 0 END) as range_271_365"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 365 AND 450 THEN bill_amount_remained ELSE 0 END) as range_365_450"),
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
                ->groupBy('reg_no', 'full_name')
                ->get();

            // Check if bills are found
            if ($bills->isEmpty()) {
                $message = 'No Bills Found for the selected filters. Please recheck the filters and try again.';
            }

            // If bills are found, return the data
            $data['bills'] = $bills;
        } else {

            // No filters are filled, return default values
            $monthEndDate1 = now();

            $monthEndDate = $monthEndDate1->format('Y-m-d');

            $bills = DB::table('student_bills')
                ->select(
                    'reg_no',
                    'full_name',
                    DB::raw('SUM(bill_amount_remained) as total_balance'),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 0 AND 90 THEN bill_amount_remained ELSE 0 END) as range_0_90"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 91 AND 180 THEN bill_amount_remained ELSE 0 END) as range_91_180"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 181 AND 270 THEN bill_amount_remained ELSE 0 END) as range_181_270"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 271 AND 365 THEN bill_amount_remained ELSE 0 END) as range_271_365"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 365 AND 450 THEN bill_amount_remained ELSE 0 END) as range_365_450"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 451 AND 540 THEN bill_amount_remained ELSE 0 END) as range_451_540"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 541 AND 630 THEN bill_amount_remained ELSE 0 END) as range_541_630"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 631 AND 720 THEN bill_amount_remained ELSE 0 END) as range_631_720"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 721 AND 810 THEN bill_amount_remained ELSE 0 END) as range_721_810"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 811 AND 900 THEN bill_amount_remained ELSE 0 END) as range_811_900"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 901 AND 990 THEN bill_amount_remained ELSE 0 END) as range_901_990"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 991 AND 1080 THEN bill_amount_remained ELSE 0 END) as range_991_1080"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) > 1080 THEN bill_amount_remained ELSE 0 END) as range_above_1080")
                )
                ->groupBy('reg_no', 'full_name')
                ->get();

            $data['bills'] = $bills;
        }

        $data['academicYears'] = $academicYears;
        $data['programmes'] = $programmes;
        $data['request'] = $request;

        // Pass the message to the view
        $data['message'] = $message;

        return view('student_import_bills.ageing_analysis', $data);
    }


    public function exportAgingReport(Request $request)
    {
        // Check if the filters are filled
        if ($request->filled(['academic_year', 'program_code'])) {
            $accountYear = $request->input('academic_year');
            $progCode = $request->input('program_code');
            $monthEndDate = $this->getMonthEndDate($request);

            $bills = DB::table('student_bills')
                ->select(
                    'reg_no',
                    'full_name',
                    DB::raw('SUM(bill_amount_remained) as total_balance'),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 0 AND 90 THEN bill_amount_remained ELSE 0 END) as range_0_90"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 91 AND 180 THEN bill_amount_remained ELSE 0 END) as range_91_180"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 181 AND 270 THEN bill_amount_remained ELSE 0 END) as range_181_270"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 271 AND 365 THEN bill_amount_remained ELSE 0 END) as range_271_365"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 365 AND 450 THEN bill_amount_remained ELSE 0 END) as range_365_450"),
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
                ->groupBy('reg_no', 'full_name')
                ->get();
        } else {
            $monthEndDate1 = now();
            $monthEndDate = $monthEndDate1->format('Y-m-d');

            $bills = DB::table('student_bills')
                ->select(
                    'reg_no',
                    'full_name',
                    DB::raw('SUM(bill_amount_remained) as total_balance'),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 0 AND 90 THEN bill_amount_remained ELSE 0 END) as range_0_90"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 91 AND 180 THEN bill_amount_remained ELSE 0 END) as range_91_180"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 181 AND 270 THEN bill_amount_remained ELSE 0 END) as range_181_270"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 271 AND 365 THEN bill_amount_remained ELSE 0 END) as range_271_365"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 365 AND 450 THEN bill_amount_remained ELSE 0 END) as range_365_450"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 451 AND 540 THEN bill_amount_remained ELSE 0 END) as range_451_540"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 541 AND 630 THEN bill_amount_remained ELSE 0 END) as range_541_630"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 631 AND 720 THEN bill_amount_remained ELSE 0 END) as range_631_720"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 721 AND 810 THEN bill_amount_remained ELSE 0 END) as range_721_810"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 811 AND 900 THEN bill_amount_remained ELSE 0 END) as range_811_900"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 901 AND 990 THEN bill_amount_remained ELSE 0 END) as range_901_990"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) BETWEEN 991 AND 1080 THEN bill_amount_remained ELSE 0 END) as range_991_1080"),
                    DB::raw("SUM(CASE WHEN DATEDIFF('$monthEndDate', bill_date) > 1080 THEN bill_amount_remained ELSE 0 END) as range_above_1080")
                )
                ->groupBy('reg_no', 'full_name')
                ->get();
        }

        //single sheet
        // return Excel::download(new DegreeAgeingReportExport($billAgeingData, $monthEndDate), 'ECL REPORT FOR DEGREE.xlsx');


        //download excel sheet with multiple sheet title  

        return Excel::download(
            new FinalExpectedCreditLossExport($bills, $monthEndDate),
            'ECL REPORT FOR DEGREE.xlsx'
        );
    }

 
    
    private function getMonthEndDate(Request $request)
    {
        if ($request->ageing_type === 'month') {
            return $request->input('month_date');
        } elseif ($request->ageing_type === 'quarter') {
            $quarterString = $request->input('quarter_date');
            $quarter = explode(' ', $quarterString)[0];
            $year = (int)explode(' ', $quarterString)[1];

            switch ($quarter) {
                case 'Q1':
                    return Carbon::createFromDate($year, 9, 30)->format('Y-m-d');
                case 'Q2':
                    return Carbon::createFromDate($year, 12, 31)->format('Y-m-d');
                case 'Q3':
                    return Carbon::createFromDate($year, 3, 31)->format('Y-m-d');
                case 'Q4':
                    return Carbon::createFromDate($year, 6, 30)->format('Y-m-d');
                default:
                    return now()->format('Y-m-d');
            }
        }
        return now()->format('Y-m-d');
    }
}
