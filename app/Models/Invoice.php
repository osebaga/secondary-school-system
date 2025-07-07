<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transaction() {
        return $this->belongsTo(Transaction::class, 'control_number', 'paymentReference');
    }

    public function feeStructure() {
        return $this->belongsTo(FeeStructure::class, 'id', 'fee_type_id');
    }

    protected $appends = ['balance', 'paid_amount', 'payment_status'];

    public function getBalanceAttribute() {
        $balance = 0;

        // get total amount of all itansactions with the invoice control number
        $paidAmount = Transaction::where('paymentReference', $this->control_number)->sum('amount');

        $balance = doubleval($this->amount) - doubleval($paidAmount); //  -ve balance means overpaid
        // if($balance < 0) // -ve balance means overpaid
        // {
        //     $balance = 0;
        // }
        return $balance;
    }

    public function getPaidAmountAttribute() {

        // get total amount of all itansactions with the invoice control number
        $paidAmount = Transaction::where('paymentReference', $this->control_number)->sum('amount');

        return $paidAmount;
    }

    public function getPaymentStatusAttribute() {
        $invoice_amount = $this->amount;
        $balance = $this->getBalanceAttribute();

        if ($balance == $invoice_amount) return 'unpaid';
        else if ($balance == 0) return 'paid';
        else if ($balance > 0) return 'partially paid';
        else return 'overpaid';

    }
}
