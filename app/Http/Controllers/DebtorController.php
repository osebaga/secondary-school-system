<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Debtor;
use App\Models\Invoice;
use App\Models\Program;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebtorController extends Controller
{
    //create debtors report here

    public function create_debtor_report()
    {
        //get list of std per year
        $year = AcademicYear::active()->first();
        // $std = StudentClass::where('class_year',$year->id)->get();
        // $invoices = Invoice::where('year_id',$year->id)->get(); //add status in invoice table
        // dd($invoices);
        // $invoices = Invoice::where('year_id',$year->id)->get();
        $invoices = DB::table('invoices')
            ->where('year_id', $year->id)
            ->where('debt_status', 0)
            ->get();

        if ($invoices) {

            foreach ($invoices as $st) {
                $reg_no = $st->reg_no;

                $user = User::where('username', $reg_no)->first();

                $fname = isset($user->first_name) ? $user->first_name : '';
                $lname = isset($user->last_name) ? $user->last_name : '';
                $name = $fname . ' ' . $lname;

                $program = StudentClass::where('reg_no', $reg_no)->first();
                $prog_id = isset($program->program_id) ? $program->program_id : '';
                $prog_name = Program::where('id', $prog_id)->first();

                $prog_code = isset($prog_name->program_code) ? $prog_name->program_code : '';
                $program_name = isset($prog_name->program_name) ? $prog_name->program_name : '';

                $std = Student::where('reg_no', $reg_no)->first();
                $intake = isset($std->intake_category_id) ? $std->intake_category_id : '';
                $campus = isset($std->campus_id) ? $std->campus_id : '';
                $status = isset($std->status) ? $std->status : '';

                $debt_invoice =
                    [
                        'reg_no' => $reg_no,
                        'account_year' => AcademicYear::where('id', $st->year_id)->first()->year,
                        'year_id' => $st->year_id,
                        'amount' => $st->amount,
                        'side' => 'DR',
                        'std_name' => $name,
                        'fee_name' => $st->type,
                        'prog_code' => $prog_code,
                        'prog_name' => $program_name,
                        'nta_level' => 'NULL',
                        'intake' => $intake,
                        'campus' => $campus,
                        'std_status' => $status

                    ];

                $std_invoice = Debtor::create($debt_invoice);
                if ($std_invoice) {
                    $debt_status = ['debt_status' => 1];
                    $update_debt_status = Invoice::where('id', $st->id)->update($debt_status);

                    if ($update_debt_status) {
                        $transactions = DB::table('transactions')
                            ->where('payerID', Invoice::where('id', $st->id)->first()->reg_no)
                            ->where('debt_status', 0)
                            ->get();

                        if ($transactions) {
                            foreach ($transactions as $trans) {
                                $reg_no = $trans->payerID;

                                //sum up all invoices create by std
                                // $invoices = Invoice::where('year_id',$st->year_id)->get();

                                $debt_trans =
                                    [
                                        'reg_no' => $reg_no,
                                        'account_year' => $trans->account_year,
                                        'year_id' => $trans->year_id,
                                        'amount' => $trans->amount,
                                        'side' => 'CR',
                                        'std_name' => $trans->payerName,
                                        'fee_name' => $trans->paymentDesc,
                                        'prog_code' => $prog_code,
                                        'prog_name' => $program_name,
                                        'nta_level' => 'NULL',
                                        'intake' => $intake,
                                        'campus' => $campus,
                                        'std_status' => $status

                                    ];

                                // dd($debt_invoice);
                                $std_invoice = Debtor::create($debt_trans);
                                if ($std_invoice) {
                                    $debt_status = ['debt_status' => 1];
                                    $update_debt_status = Transaction::where('id', $trans->id)->update($debt_status);
                                }
                            }
                        }
                    }
                }
            }
        } 

            //update payment only
            $transactions = Transaction::where('debt_status', 0)->get();
            if (!empty($transactions)) {
                foreach ($transactions as $trans) {
                    $reg_no = $trans->payerID;
                    $user = User::where('username', $reg_no)->first();

                    $fname = isset($user->first_name) ? $user->first_name : '';
                    $lname = isset($user->last_name) ? $user->last_name : '';
                    $name = $fname . ' ' . $lname;
    
                    $program = StudentClass::where('reg_no', $reg_no)->first();
                    $prog_id = isset($program->program_id) ? $program->program_id : '';
                    $prog_name = Program::where('id', $prog_id)->first();
    
                    $prog_code = isset($prog_name->program_code) ? $prog_name->program_code : '';
                    $program_name = isset($prog_name->program_name) ? $prog_name->program_name : '';
    
                    $std = Student::where('reg_no', $reg_no)->first();
                    $intake = isset($std->intake_category_id) ? $std->intake_category_id : '';
                    $campus = isset($std->campus_id) ? $std->campus_id : '';
                    $status = isset($std->status) ? $std->status : '';

                    $debt_trans =
                        [
                            'reg_no' => $reg_no,
                            'account_year' => $trans->account_year,
                            'year_id' => $trans->year_id,
                            'amount' => $trans->amount,
                            'side' => 'CR',
                            'std_name' => $trans->payerName,
                            'fee_name' => $trans->paymentDesc,
                            'prog_code' => $prog_code,
                            'prog_name' => $program_name,
                            'nta_level' => 'NULL',
                            'intake' => $intake,
                            'campus' => $campus,
                            'std_status' => $status

                        ];
                        
                       $std_invoice = Debtor::create($debt_trans);
                    if ($std_invoice) {
                        $debt_status = ['debt_status' => 1];
                        $update_debt_status = Transaction::where('id', $trans->id)->update($debt_status);
                    }
                }
            }
        
        return redirect('dashboard/billing/debtor-list')->with('message','Debtor Report Created Successfully!!');
    }

    public function debtor_report_list()
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Debtor List']];
        $debtors = Debtor::where('side', 'DR')->groupby('reg_no')->get();


        return view('dashboard.billing.debtorsreport.create', compact('bc', 'debtors'));
    }


    public function download_statement_by_regno($reg_no)
    {

        $check = Transaction::where('payerID', $reg_no)->get()->first();
        if (!empty($check)) {

            $bills = DB::table('invoices')
                ->where('reg_no', $reg_no)
                ->where('status', '!=', 0)
                ->get();

            $trans_details = Transaction::where('payerID', $reg_no)->orderby('transactionDate', 'asc')->get();
            $std_trans = Transaction::where('payerID', $reg_no)->get();

            $data['data'] = $std_trans;

            $pdf = Pdf::loadView('dashboard.billing.debtorsreport.statement_report', compact('bills', 'trans_details'), $data)->setPaper('a4', 'landscape');

            return $pdf->download('Student Account Statement-' . $reg_no . '.pdf');
        } else {
            return redirect('dashboard/billing/debtor-list')->with('debt_message', 'There is no payment made for this particular student');
        }
    }
}
