<?php

namespace App\Http\Controllers;

use App\Exports\StudentMonthlyTemplateExport;
use App\Imports\StudentMonthlyPaymentImport;
use App\Models\AcademicYear;
use App\Models\Program;
use App\Models\StudentMonthlyPayment;
use App\Models\StudyLevel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\StudentMonthlyPaymentImported;
use Illuminate\Support\Facades\Notification;

class StudentMonthlyPaymentController extends Controller
{
    public function importStudentPayments(Request $request)
    {
        $data['bc'] = [
            ['link' => route('dashboard'), 'page' => 'Dashboard'],
            ['link' => '#', 'page' => 'Import Student Bill']
        ];
        if ($request->isMethod('post')) {

            try {
                $request->validate([
                    'account_year' => 'required|exists:academic_years,id',
                    'programme_id' => 'required',
                    'nta_level_id' => 'required|exists:study_levels,id',
                    'bill_date' => 'required|date',
                    'file' => 'required|mimes:xlsx,xls,csv'
                ]);

                $import = new StudentMonthlyPaymentImport(
                    $request->account_year,
                    $request->programme_id,
                    $request->nta_level_id,
                    $request->bill_date
                );

                Excel::queueImport($import, $request->file('file'));


                return redirect()
                    ->route('student.monthy.payment.import') // make sure to name this route
                    ->with('success', 'Student payments are being imported in the background. You will be notified once done.');


                $user = auth()->user(); // or whichever user you want to notify
                Notification::send($user, new StudentMonthlyPaymentImported());
            } catch (\Illuminate\Validation\ValidationException $e) {
                return back()->withErrors($e->errors())->withInput();
            }
        }
        $data['account_years'] = AcademicYear::all();
        $data['programmes'] = Program::all();
        $data['nta_levels'] = StudyLevel::all();
        $studentBills = StudentMonthlyPayment::all();
        $data['student_bills'] = $studentBills;

        return view('student_import_bills.importmonthlypayment', $data)->with('success', 'Student bills imported successfully!');
        // return back()->with('success', 'Student bills imported successfully!');
    }



    public function exportMonthlyTemplate()
    {
        return Excel::download(new StudentMonthlyTemplateExport, 'monthly_payment_template.xlsx');
    }
}
