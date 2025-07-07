<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCategoryResult extends Model
{
    use HasFactory;
    protected $guarded = [];
//    protected $fillable =[
//     'reg_no','year_id','semester_id','course_id','exam_category_id','exam_score'
//    ];

    public function examCategory(){
        return $this->belongsTo(ExamCategory::class,'exam_category_id');
    }
    public function  course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'reg_no','reg_no');
    }
    public function semester(){
       
        return $this->belongsTo(Semester::class,'semester_id');
    }

    public function examscore()
    {
        return $this->hasMany(ExamScore::class,'reg_no','reg_no','course_id');
    }
}
