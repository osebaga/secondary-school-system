<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['payment_type_id', 'payment_type_id', 'paid_amount', 'payer_email', 'payer_mobile', 'reference_number', 'channel_transaction_id', 'reg_no', 'year_id'];

    public function payment_types()
    {
        return $this->hasMany(PaymentType::class, 'payment_type_id');
    }
}
