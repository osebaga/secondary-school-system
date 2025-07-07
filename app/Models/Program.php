<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Program extends Model
{

    protected $fillable=[
        'faculty_id',
        'year_id',
        'program_name',
        'program_code',
        'program_acronym',
        'program_type',
        'program_category',
        'program_duration',
        'program_weight',
        'is_approved',
        'tuition_fee',
        'tag',
    ];
    public function scopeAcademicYear($query){
        if (Auth::user()->type==1) {
            return $query->where('programs.year_id', '=', Auth::user()->staff->year_id);
        }elseif(Auth::user()->type==0){
            return $query->where('programs.year_id', '=', Auth::user()->student->year_id);

        }
    }
    public function scopeProgramId($query,$program_id){
    return $query->where('programs.id','=',$program_id);
   }
    public function scopeProgramCode($query,$program_code){
        return $query->where('programs.program_code','=',$program_code);
    }

    public function scopeDepartmentId($query,$department_id){
        return $query->where('programs.department_id','=',$department_id);
    }
    public function scopeIsApproved($query){
        return $query->where('programs.is_approved','=',1);

    }
    public function student(){
        return $this->hasMany(Student::class);
    }
    public function academic_year(){
        return $this->belongsTo(AcademicYear::class,'year_id','id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class)
            ->withPivot('id','year_id', 'year','core','semester')
            ->withTimestamps()->orderBy('course_code');
    }
    public function studentProgramme(){
        return $this->hasMany(StudentClass::class, 'program_id');
    }

    public function combinations(){
        return $this->hasMany(Combination::class, 'programme_id');
    }

}


