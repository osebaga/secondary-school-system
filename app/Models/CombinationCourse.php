<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombinationCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'combination_code',
        'combination_id',
        'programme_id',
        'course_id',
        'year_id',
        'semester',
        'year_of_study'
    ];

    public function academicYears(){
        return $this->belongsTo(AcademicYear::class, 'year_id');
    }
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function combinations(){
        return $this->belongsToMany(Combination::class, 'combination_id');
    }

}
