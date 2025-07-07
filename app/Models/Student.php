<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
 
       
    protected $dates = ['deleted_at'];

    public function mannerOfEntry(){
        return $this->belongsTo(MannerOfEntry::class);
    }
    public function dependants(){
        return $this->hasMany(Dependant::class,'reg_no','reg_no');
    }
    public function nextOfKins(){
        return $this->hasMany(NextOfKin::class,'reg_no','reg_no');
    }
    public function admissionYear(){
        return $this->belongsTo(AcademicYear::class,'admission_year','id');
    }

    public function educationHistories(){
        return $this->hasMany(EducationHistory::class,'reg_no','reg_no');
    }
    public function banks(){
        return $this->hasMany(StudentBank::class,'reg_no','reg_no');
    }

    public function sponsors(){
        return $this->hasMany(StudentSponsor::class,'reg_no','reg_no');
    }

    public function payments(){
        return $this->hasMany(StudentPayment::class,'reg_no','reg_no');
    }
    public function contact(){
        return $this->hasOne(StudentContact::class,'reg_no','reg_no');
    }
    public function intake_category(){
        return $this->belongsTo(IntakeCategory::class);
    }
    public function campus(){
        return $this->belongsTo(Campus::class);
    }
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function scopeFormFourIndexNo($query,$index_no){
        $query->where('students.form4_index_no',$index_no);
    }
    public function scopeAcademicYear($query){
        if (Auth::user()->type==1) {
            $query->where('students.year_id', Auth::user()->staff->year_id);
        }elseif (Auth::user()->type==0){
            $query->where('students.year_id',Auth::user()->student->year_id);

        }
        }
    public function scopeStudentAcademicYear($query){
        $query->where('students.year_id',Auth::user()->student->year_id);

    }
   public  function student_class(){
        return $this->hasMany(StudentClass::class,'reg_no','reg_no');
   }
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function program(){
        return $this->belongsTo(Program::class);

    }
    public function academic_year(){
        return $this->belongsTo(AcademicYear::class,'year_id','id');
    }
    public function mean_test(){
       return $this->belongsTo(MeanTest::class,'reg_no','reg_no');
    }
    public function transactions(){
     return $this->hasMany(StudentTransaction::class,'reg_no','reg_no');
    }
    public function direct_cost(){
        return $this->belongsTo(DirectCost::class,'year_id','year_id');
    }

    public function courses(){
        return $this->belongsToMany(Course::class)
                     ->withPivot('student_id','reg_no','course_id','year_id','semester','carry_over','display','change_access','cs_status')
                     ->withTimestamps();
    }


    public function results(){
        return $this->hasManyThrough(Result::class, CourseStudent::class,'student_id','cs_id','id','id');

    }
    public function invoices(){

    }

    public function unpaid()
    {
        return $this->hasMany(UnpaidStudent::class,'reg_no','reg_no');
    }

    public function getFullNameAttribute($value)
    {
        $user = User::find($this->user_id);
        return ucfirst($user->first_name).' '.ucfirst($user->middle_name).' '.ucfirst($user->last_name);
    }

}



