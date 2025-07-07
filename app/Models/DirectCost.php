<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DirectCost extends Model
{


    protected $fillable=[
        'year_id','college_id','amount',
        'amount_min_sem1','first_year_amount',
        'first_year_amount_min_sem1',
        'amount_graduate','first_year_amount_graduate'
    ];
    public function college(){
        return $this->belongsTo(College::class);
    }
    public function academic_year(){
        return $this->belongsTo(AcademicYear::class);
    }
}
