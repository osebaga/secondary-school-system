<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Grade extends Model
{

    use HasFactory;

    protected $table='grades';
    protected $fillable=[
        'study_level_id',
        'year_id',
        'grade',
        'high_value',
        'low_value',
        'grade_point',
        'left_value',
        'operator',
        'right_value',
        'point_decimal_place'
    ];
    public function scopeAcademicYear($query){
        return $query->where('grades.year_id','=',Auth::user()->staff->year_id);
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'scheme_id','scheme_id');
    }
}
