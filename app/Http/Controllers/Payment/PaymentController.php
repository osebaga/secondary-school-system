<?php

namespace App\Http\Controllers\Payment;
use App\Repositories\Common\Repository;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\SRS;
use App\Models\AcademicYear;
use App\Models\FeeStructure;
use App\Models\Institution;
use App\Models\Invoice;
use App\Models\Program;
use App\Models\StudentClass;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use \Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $fee_model;

    function __construct()
    {
        $this->fee_model = new Repository(new FeeStructure());
    }

    public function index()
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Payment ']];

        $payments = Invoice::where('reg_no', auth()->user()->username)->latest()->get();

        return view('dashboard.student.payment.index', compact('bc', 'payments'));
    }


    public function index2()
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Payment ']];

        $payments = Transaction::where('payerID', auth()->user()->username)->get();

        return view('dashboard.student.payment.index2', compact('bc', 'payments'));
    }

    public function create()
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Payment ']];

        $fee_types = FeeStructure::all();

        return view('dashboard.student.payment.create', compact('fee_types', 'bc'));
    }

    public function store()
    {
        try {
            $url = 'http://41.59.228.152/SAMIS-crdb/index.php/api/v1/generatectlno';

            $fee_type = FeeStructure::where('id', request()->fee_type)->first();

            $params = [
                'systemName' => 'SPG',
                'firstName' => auth()->user()->first_name,
                'lastName' => auth()->user()->last_name,
                'amount' => request()->amount,
                'amountType' => $fee_type->amount_type,
                'currency' => 'TZS',
                'payerMobile' => request()->mobile,
                'paymentDesc' => $fee_type->name,
                'payerID' => auth()->user()->username,
                'email' => request()->email,
                'paymentType' => $fee_type->payment_type,
            ];

            $response = Http::post($url, $params);

            if ($response->successful()) {
                $invoice_info = [
                    'fee_type_id' => request()->fee_type,
                    'reg_no' => auth()->user()->username,
                    'amount' => request()->amount,
                    'type' => $fee_type->name,
                    'control_number' => $response['reference_number'],
                    'description' => request()->description,
                    'currency' => 'TZS',
                    // 'year_id' => StudentClass::where('reg_no', auth()->user()->username)
                    //     ->pluck('year_id')
                    //     ->first(),
                    'year_id' => AcademicYear::active()->first()->id,
                    'year' => AcademicYear::active()->first()->year,
                    'sent' => 1,
                ];

                $created_invoice = Invoice::create($invoice_info);

                if ($created_invoice) {
                    return response()->json(['reference_number' => $response['reference_number']], 200);
                }
            } else {
                return response()->json(['reference_number' => 'Try Again Later'], 200);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['reference_number' => 'Try Again Later'], 200);
        }
    }

    public function generate_receipt($receipt)
    {
        $qs = Transaction::where('transactionRef', $receipt)->get();
        $data['data'] = $qs;

        $pdf = Pdf::loadView('dashboard.student.payment.reports.receipt', $data)->setPaper('a4', 'landscape');

        return $pdf->download('receipt-'.$qs[0]->receipt.'.pdf');
    }

    public function initiate_payment_process(Request $request)
    {
        try {
            $url = 'http://41.59.228.152/SAMIS-crdb/index.php/api/v1/generatectlno';

            $fee_type = FeeStructure::where('id', $request->fee_id)->first();

            // $student_info = StudentClass::where('reg_no', trim(Auth::user()->username))->first();

            $params = [
                'systemName' => 'SPG',
                'firstName' => $request->first_name,
                'lastName' => $request->last_name,
                'amount' => $request->amount,
                'amountType' => $fee_type->amount_type,
                'currency' => 'TZS',
                'payerMobile' => $request->mobile,
                'paymentDesc' => $fee_type->name,
                'payerID' => $request->regno,
                'email' => $request->email,
                'paymentType' => $fee_type->payment_type,
            ];

            $response = Http::post($url, $params);

            if ($response->successful()){
                $invoice_info = [
                    'fee_type_id' => $request->fee_type,
                    'reg_no' => $request->regno,
                    'amount' => $request->amount,
                    'type' => $fee_type->name,
                    'control_number' => $response['reference_number'],
                    'description' => $request->description,
                    'currency' => 'TZS',
                    'year_id' => AcademicYear::active()->first()->id,
                    'year' => AcademicYear::active()->first()->year,
                    'sent' => 1,
                ];

                $created_invoice = Invoice::create($invoice_info);

                if ($created_invoice) {
                    return response()->json(['reference_number' => $response['reference_number']], 200);
                }
            } else {
                return response()->json(['reference_number' => 'Try Again Later'], 200);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['reference_number' => 'Try Again Later'], 200);
        }
    }

    public function show_fee_form(Request $request)
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Fee Structure']];

        $programmes = Program::all();

        $fees = FeeStructure::all();

        return view('dashboard.settings.fee-structure.fee_structure', compact('bc', 'programmes', 'fees'));
    }

    public function store_fee_structure(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'amount' => 'required|numeric|min:1000',
            'programme_code' => 'required',
            'payment_type' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        $fee_structures = [
            'name' => $request->name,
            'amount' => $request->amount,
            'programme_code' => $request->programme_code,
            'amount_type' => $request->amount_type,
            'currency' => 'TZS',
            'payment_type' => $request->payment_type,
        ];

        $created_structures = FeeStructure::create($fee_structures);

        if ($created_structures) {
            return back()->with('message', 'Fee Structure Successfully Added');
        } else {
            return back()->with('errors', 'Something Went Wrong');
        }
    }

    public function delete_fee_structure($id)
    {
        $fee_deleted = FeeStructure::where('id', SRS::decode($id))->delete();

        if ($fee_deleted) {
            return back()->with('message', 'Fee Deleted');
        } else {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit_fee_structure($id)
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Fee Structure']];

        $fee = FeeStructure::where('id', SRS::decode($id))->first();

        if ($fee) {
            return view('dashboard.settings.fee-structure.edit_fee_structure', compact('fee', 'bc'));
        } else {
            return back()->with('error', 'Page Not Found');
        }
    }

    public function update_fee_structure(Request $request, $id)
    {
        $updated_fee = FeeStructure::where('id', $id)->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'programme_code' => $request->programme_code,
            'amount_type' => $request->amount_type,
            'payment_type' => $request->payment_type,
        ]);

        if ($updated_fee) {
            return redirect('dashboard/feestructures')->with('message', 'Data Updated');
        } else {
            return redirect('dashboard/feestructures')->with('error', 'Data Not Updated');
        }
    }

    // public function initiate_payment_process(Request $request)
    // {
    //     $reference_number = $this->generate_reference();
    //     $transaction_id = $this->generate_transaction_id();

    //     $request->validate([
    //         'fee_type' => 'required',
    //         'amount' => 'required|numeric',
    //         'email' => 'required|email',
    //         'mobile' => 'required',
    //     ]);

    //     $payment_info = Payment::create([
    //         'payment_type_id' => $request->fee_type,
    //         'paid_amount' => $request->amount,
    //         'payer_email' => $request->email,
    //         'payer_mobile' => $request->mobile,
    //         'reference_number' => $reference_number,
    //         'channel_transaction_id' => $transaction_id,
    //         'reg_no' => Auth::user()->username,
    //         'year_id' => Student::where('reg_no', Auth::user()->username)
    //             ->pluck('year_id')
    //             ->first(),
    //     ]);

    //     if ($payment_info) {
    //         $response = $this->send_payment_info($reference_number, $transaction_id, $request->amount);

    //         if ($response === 'error') {
    //             return back()->with('error', 'Process Failed Please Try Again after sometime');
    //         } else {
    //             Payment::where('channel_transaction_id', $transaction_id)->update(['redirect_link' => $response, 'sent' => 1]);
    //             return redirect($response);
    //         }
    //     }
    // }

    // public function send_payment_info($reference_number, $transaction_id, $amount)
    // {
    //     // $username = 'e322f7ebc049ac71';
    //     // $password = 'M2Y1MjNlZTY1YTJlNjg1NWM0NzRlZTE3ZDJiOWYxMmIyNDdiM2Q5MzExNWY3NjY5MzU1Mjk1MmVlZTViZWQyMQ==';

    //     // $url = 'https://checkout.beem.africa/v1/checkout';

    //     $params = [
    //         'amount' => $amount,
    //         'transaction_id' => $transaction_id,
    //         'reference_number' => $reference_number,
    //         'sendSource' => true,
    //     ];

    //     $response = Http::withHeaders([
    //         'Authorization' => 'Basic ' . base64_encode("$username:$password"),
    //         'Content-Type' => 'application/json',
    //     ])->get($url, $params);

    //     if ($response->successful()) {
    //         return $response['src'];
    //     } else {
    //         return 'error';
    //     }
    // }

    // public function generate_transaction_id()
    // {
    //     if (function_exists('random_bytes')) {
    //         $data = random_bytes(16);
    //     } elseif (function_exists('openssl_random_pseudo_bytes')) {
    //         $data = openssl_random_pseudo_bytes(16);
    //     } else {
    //         // Fallback to less secure method if random_bytes and openssl_random_pseudo_bytes are not available
    //         $data = uniqid('', true);
    //     }

    //     $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // Set version to 4
    //     $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // Set variant to RFC 4122

    //     return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    // }

    // public function generate_reference()
    // {
    //     return 'SAMIS-' . SRS::encode(str_replace(' ', '', preg_replace('/[^a-zA-Z0-9\s]/', '', Carbon::now())));
    // }


    //accountant officer part
    public function payment_list()
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Payment List']];
        $payments = Transaction::orderby('id','desc')->get();
        return view('dashboard.billing.payment_list', compact('bc', 'payments'));
    }

    public function download_receipt($receipt)
    {
        // $inst = Institution::all();
        
        $qs = Transaction::where('transactionRef', $receipt)->get();
        
        $data['data'] = $qs;

        $pdf = Pdf::loadView('dashboard.billing.payment_receipt_by_rctno', $data)->setPaper('a4', 'landscape');
        return $pdf->download('Receipt-'.$qs[0]->receipt.'.pdf');
    }

    public function download_receipt_by_regno($regno)
    {
        $trans = Transaction::where('payerID', $regno)->orderby('amount','asc')->get();
        
        $data['data'] = $trans;

        $pdf = Pdf::loadView('dashboard.billing.payment_receipt_by_regno', compact('trans'),$data)->setPaper('a4', 'landscape');

        return $pdf->download('payment_Receipt-'.$regno.'.pdf');
    }

    public function download_receipt_by_ctlno($ctlno)
    {
        $trans = Transaction::where('paymentReference', $ctlno)->orderby('amount','asc')->get();

        $data['data'] = $trans;

        $pdf = Pdf::loadView('dashboard.billing.payment_receipt_by_ctl', compact('trans'),$data)->setPaper('a4', 'landscape');
        return $pdf->download('payment_Receipt-'.$ctlno.'.pdf');
    }

    public function invoice_list()
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Bill List']];
        $invoices = Invoice::orderby('id','desc')->get();


        return view('dashboard.billing.bill_list', compact('bc', 'invoices'));
    }

    public function create_ctl_no()
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Payment Reference ']];
        $fees = FeeStructure::all();
        // $std_info = User::where('type','0')->get();

        return view('dashboard.billing.create', compact('bc', 'fees'));
    }

    public function store_ctl_number(Request $request)
    {
        try {
            $url = 'http://41.59.228.152/SAMIS-crdb/index.php/api/v1/generatectlno';

            $fee_type = FeeStructure::where('id', $request->fee_type)->first();

            // $student_info = StudentClass::where('reg_no', trim(Auth::user()->username))->first();

            $params = [
                'systemName' => 'SPG',
                'firstName' => $request->first_name,
                'lastName' => str_replace(',','',$request->last_name),
                'amount' => $request->amount,
                'amountType' => $fee_type->amount_type,
                'currency' => 'TZS',
                'payerMobile' => $request->mobile,
                'paymentDesc' => $fee_type->name,
                'payerID' => $request->regno,
                'email' => $request->email,
                'paymentType' => $fee_type->payment_type,
            ];

            $response = Http::post($url, $params);

            if ($response->successful()){
                $invoice_info = [
                    'fee_type_id' => $request->fee_type,
                    'reg_no' => $request->regno,
                    'amount' => $request->amount,
                    'type' => $fee_type->name,
                    'control_number' => $response['reference_number'],
                    'description' => $request->description,
                    'currency' => 'TZS',
                    'year_id' => AcademicYear::active()->first()->id,
                    'year' => AcademicYear::active()->first()->year,
                    'sent' => 1,
                ];

                $created_invoice = Invoice::create($invoice_info);

                if ($created_invoice) {
                    return response()->json(['reference_number' => $response['reference_number']], 200);
                }
            } else {
                return response()->json(['reference_number' => 'Try Again Later'], 200);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['reference_number' => 'Try Again Later'], 200);
        }
    }
}
