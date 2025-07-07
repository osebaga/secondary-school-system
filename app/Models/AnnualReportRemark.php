<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualReportRemark extends Model
{
    use HasFactory;


    protected $fillable = ['gender', 'reg_no', 'academic_year', 'program_id', 'batch_no', 'remark'];

}
