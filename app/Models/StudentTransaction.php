<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTransaction extends Model
{
    use HasFactory;

    protected $fillable=[
        'staff_id','reg_no','year_id','is_tuition_fee','amount_payed','payed_by','paid_via'
    ];
}
