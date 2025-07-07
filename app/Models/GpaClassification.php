<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class GpaClassification extends Model
{
    use HasFactory;

    protected $table='gpa_classifications';
    protected $fillable=[
        'study_level_id',
        'year_id',
        'class_award',
        'high_gpa',
        'low_gpa',
        'grade_point',
    ];
    public function scopeAcademicYear($query){
        return $query->where('grades.year_id','=',Auth::user()->staff->year_id);
    }
    public function studyLevel(){
        return $this->belongsTo(StudyLevel::class);
    }
}
