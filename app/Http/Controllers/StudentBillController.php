<?php
namespace App\Http\Controllers;

use App\Exports\StudentBillTemplateExport;
use Illuminate\Http\Request;
use App\Imports\StudentBillImport;
use App\Imports\StudentImport;
use App\Models\AcademicYear;
use App\Models\Program;
use App\Models\StudentBill;
use App\Models\StudyLevel;
use Maatwebsite\Excel\Facades\Excel;

class StudentBillController extends Controller
{
    /**
     * Import student bills from an uploaded Excel file.
     */
    public function importStudentBills(Request $request)
    {
        $data['bc'] = [
            ['link' => route('dashboard'), 'page' => 'Dashboard'],
            ['link' => '#', 'page' => 'Import Student Bill']
        ];
        if($request->isMethod('post')){ 
          
        try {
            $request->validate([
                'account_year' => 'required|exists:academic_years,id',
                'programme_id' => 'required',
                'nta_level_id' => 'required|exists:study_levels,id',
                'bill_date' => 'required|date',
                'file' => 'required|mimes:xlsx,xls,csv'
            ]);
        
            $import = new StudentBillImport(
                $request->account_year,
                $request->programme_id,
                $request->nta_level_id,
                $request->bill_date
            );
        
            Excel::queueImport($import, $request->file('file'));

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
          
    }
    $data['account_years'] = AcademicYear::all();
    $data['programmes'] = Program::all();
    $data['nta_levels'] = StudyLevel::all();
    $studentBills = StudentBill::all();
    $data['student_montly_payments'] = $studentBills;

    return view('student_import_bills.importstudentbill',$data)->with('success', 'Student bills imported successfully!');
        // return back()->with('success', 'Student bills imported successfully!');
    }


    public function exportTemplate()
{
    return Excel::download(new StudentBillTemplateExport, 'student_bill_template.xlsx');
}
}
