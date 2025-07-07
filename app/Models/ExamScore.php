<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    use HasFactory;
    
    protected $guarded = [];


    public function examscategory()
    {
        return $this->hasMany(ExamCategoryResult::class,'reg_no','reg_no','course_id');
    }
    
}
