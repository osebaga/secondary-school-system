<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class CourseProgram extends Model
{
    use HasFactory;


    protected $table='course_program';

    protected $fillable=[
        'course_id','program_id','year_id','year','core','semester','stream',
    ];
    public function scopeAcademicYear($query){
        return $query->where('course_program.year_id','=',Auth::user()->staff->year_id);
    }
    public function scopeProgramId($query,$program_id){
        return $query->where('course_program.program_id','=',$program_id);
    }


    public function prog()
    {
        return $this->belongsTo('App\Models\Program','program_id');
    }

    public function programcourse()
    {

        return $this->hasOne('App\Models\Course','course_id');

    }
}
