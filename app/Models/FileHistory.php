<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FileHistory extends Model
{
    use HasFactory;


    protected $fillable=[
        'year_id',
        'staff_id',
        'file_name',
        'section',
        'location'
    ];
    public function staff(){
        return $this->belongsTo(Staff::class);
    }
    public  function academic_year(){
        return $this->belongsTo(AcademicYear::class,'year_id','id');
    }
}
