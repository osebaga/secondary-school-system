<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\FeeStructure;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
   public function store_payment (Request $request) {
        
        $request->validate([
            'payments' => 'required|array',
            'payments.*.payerName' => 'required|string',
            'payments.*.amount' => 'required|numeric',
            'payments.*.amountType' => 'required|string',
            'payments.*.currency' => 'required|string',
            'payments.*.paymentReference' => 'required|string',
            'payments.*.paymentType' => 'required|string',
            // 'payments.*.payerMobile' => 'required|string',
            'payments.*.paymentDesc' => 'required|string',
            'payments.*.payerID' => 'required|string',
            'payments.*.transactionRef' => 'required|string',
            'payments.*.transactionChannel' => 'required|string',
            'payments.*.transactionDate' => 'required|date',
            'payments.*.receipt' => 'required'
        ]);


        try {

            foreach ($request->payments as $paymentData) {
                $invoice = Invoice::where('control_number', $paymentData['paymentReference'])->first();
                if ($invoice) {
                    $payment = new Transaction([
                        'payerName' => $paymentData['payerName'],
                        'amount' => $paymentData['amount'],
                        'amountType' => $paymentData['amountType'],
                        'currency' => $paymentData['currency'],
                        'paymentReference' => $paymentData['paymentReference'],
                        'paymentType' => $paymentData['paymentType'],
                        'payerMobile' => $paymentData['payerMobile'],
                        'paymentDesc' => $paymentData['paymentDesc'],
                        'payerID' => $paymentData['payerID'],
                        'transactionRef' => $paymentData['transactionRef'],
                        'transactionChannel' => $paymentData['transactionChannel'],
                        'transactionDate' => $paymentData['transactionDate'],
                        'receipt' => $paymentData['receipt'],
                        'year_id'=>AcademicYear::active()->first()->id,
                        'account_year'=>AcademicYear::active()->first()->year
                    ]);
    
                    $payment->save();
    
                    // Invoice::where('control_number', $paymentData['paymentReference'])
                    //     ->increment('status');
    
                    // $feeAmount = FeeStructure::find($invoice->fee_type_id)->amount ?? 0;
    
                    /* 
                        0 -> not paid
                        1 -> fully paid 
                        2 -> partially paid
                    */
    
                    // if invoice amount is greater than the paid amount, then
                    // it has been partially paid, set invoice status to 2
                    
                    if(doubleval($invoice->amount) > doubleval($paymentData['amount'])) {
                        $invoice->status = 2;
                    } elseif(doubleval($invoice->amount) < doubleval($paymentData['amount'])) {
                        $invoice->status = 3;
                    }else{
                        $invoice->status = 1;
                    }
                    $invoice->save();

                }

            }

            return response()->json(
                [
                    'message' => 'success',
                    'transactionRef' => $paymentData['transactionRef'],
                    'statusCode' => '200'
                ], 
                200);

        } catch (\Exception $e) {

            Log::info($e->getMessage());
            
            return response()->json(['error' => 'Error saving payment, duplicate (exception: ' + $e->getMessage() + ')'], 500);

        }
                 
   }
}
