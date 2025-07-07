<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomapplication extends Model
{
    use HasFactory;

    // protected $guarded = ['*'];

    protected $fillable = [
        'reg_no',
        'year_id',
        'criteria_id',
        'reason',
        'received',
        'status',
        'processed'
    ];

    public function criteria(){
       return $this->hasOne(Criteria::class, 'id', 'criteria_id');
    }
    public function academicYear(){
       return $this->hasOne(AcademicYear::class, 'id', 'year_id');
    }

    
}
