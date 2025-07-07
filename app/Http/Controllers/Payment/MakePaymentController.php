<?php

namespace App\Http\Controllers\Payment;
use App\Repositories\Common\Repository;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\SRS;
use App\Models\Student;
use App\Models\User;
use App\Models\FeeStructure;
use App\Models\FeeType;
use App\Models\Invoice;
use App\Models\Program;
use App\Models\PaymentType;
use App\Models\StudentClass;
use App\Models\StudentPayment;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Validator;
use Illuminate\Support\Facades\Log;

class MakePaymentController extends Controller
{
    protected $fee_model;

    function __construct()
    {
        $this->fee_model = new Repository(new FeeStructure());
    }

    public function index()
    {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Payment ']];

        $payments = Invoice::where('reg_no', auth()->user()->username)->where('status', '!=', 1)->latest()->get();

        return view('dashboard.student.mypayment.make_payment.index', compact('bc', 'payments'));
    }

    public function showPaymentOptions($controlNumber) {
        $bc = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Payment ']];

        return view('dashboard.student.mypayment.make_payment.options', compact('bc', 'controlNumber'));
    }


}
