<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
class StudentClass extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'reg_no', 'year_id', 'year', 'intake_category_id', 'program_id', 'session', 'class_year', 'year_of_study'];

    protected $dates = ['deleted_at'];

    public function scopeStudentAcademicYear($query)
    {
        return $query->where('student_classes.year_id', '=', Auth::user()->student->year_id);
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'user_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'username');
    }
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function intake_category()
    {
        return $this->belongsTo(IntakeCategory::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'class_year', 'id');
    }
}
