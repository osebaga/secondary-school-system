<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamLookup extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'reg_no');
    }
    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,'year_id');
    }
}
