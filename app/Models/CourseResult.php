<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseResult extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function  course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'reg_no','reg_no');
    }
    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id');
    }

     public function userdata()
     {
         return $this->belongsTo(User::class,'username');
     }
}
