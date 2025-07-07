<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    use HasFactory;

    protected $fillable = [
    'reg_no',
    'account_year',
    'year_id',
    'amount',
    'side',
    'std_name',
    'fee_name',
    'prog_name',
    'prog_code',
    'nta_level',
    'intake',
    'campus',
    'std_status'
    ];
}
