<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model {
    use HasFactory;


    protected $fillable=[
        'department_id',
        'year_id',
        'course_code',
        'course_name',
        'course_category',
        'min_cw',
        'score_type',
        'study_level_id',
        'pass_grade',
        'unit',
        'cw',
        'final',
        'min_ue',
        'course_status',


    ];
    public function scopeAcademicYear($query){
        return $query->where('courses.year_id','=',Auth::user()->staff->year_id);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function study_level(){
        return $this->belongsTo(StudyLevel::class,'study_level_id','id');
    }
    public function grades(){
       return $this->hasMany(Grade::class,'study_level_id','study_level_id');
    }
    public function programs(){
        return $this->belongsToMany(Program::class)
            ->withPivot('id','year_id', 'year','core','semester','stream')
            ->withTimestamps();
    }
    public function staffs(){
        return $this->belongsToMany(Staff::class)
            ->withPivot('id','year_id', 'assigned_by','stream')
            ->withTimestamps();
    }

    public function students(){
        return $this->belongsToMany(Student::class)
            ->withPivot('year_id','carry_over','display','change_access','cs_status')
            ->withTimestamps();

    }
    public function assignments(){
        return $this->hasManyThrough(Assignment::class,CourseStudent::class,'course_id','cs_id','id','id');
    }
    public function course_works(){
        return $this->hasManyThrough(CourseWork::class,CourseStudent::class,'course_id','cs_id','id','id')->with('results');
    }
    public function courseworks(){
        return $this->hasMany(CourseWork::class,'course_id')->with('results');
    }
    public function results(){
        return $this->hasMany(Result::class,'course_id');
      //  return $this->hasManyThrough(Result::class,CourseStudent::class,'course_id','cs_id','id','id');



    }



    public function progcourse()
    {
        return $this->hasMany('App\Models\CourseProgram','program_id');
    }


    public function courseprog()
    {
        return $this->hasMany('App\Models\CourseProgram','course_id');
    }

    

}
