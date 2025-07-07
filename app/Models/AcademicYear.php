<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AcademicYear extends Model
{
   use HasFactory;

    protected $fillable=[
        'year','status',
    ];
    public function scopeActive($query){
       return $query->where('status','=',"1");
    }
    public function programs(){
        return $this->hasMany(Program::class);
    }


}
