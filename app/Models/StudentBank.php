<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBank extends Model
{
    use HasFactory;
    protected $fillable = ['reg_no','bank_name','account_number','sponsor'];
}
