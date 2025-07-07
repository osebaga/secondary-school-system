<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;
    protected $fillable =['reg_no','payment_type_id','year_of_study','semester','amount','date_paid'];

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
