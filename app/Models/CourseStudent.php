<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;


class CourseStudent extends Model
{
    use HasFactory;


    protected $table='course_student';
    protected $fillable=[
            'student_id','course_id','reg_no',
             'semester','year_id','carry_over',
             'display','change_access','cs_status','year_study'
        ];
   public function course(){
       return $this->belongsTo(Course::class);
   }
   public function courseResults(){
       return $this->hasMany(CourseResult::class,'course_id');
   }

   public function scopeAcademicYear($query){
    return $query->where('course_student.year_id','=',Auth::user()->staff->year_id);
}
}
