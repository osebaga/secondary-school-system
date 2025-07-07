<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBilling extends Model
{
    use HasFactory;
    protected $fillable=[
        'type_id','reg_no','amount'
    ];
}
