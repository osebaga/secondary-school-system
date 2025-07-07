<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeanTest extends Model
{

    protected $fillable=[
        'year_id','reg_no','tuition_fee','direct_cost','batch_no'
    ];

    public function academic_year(){
        return $this->belongsTo(AcademicYear::class,'year_id','id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'reg_no','reg_no');
    }
}
