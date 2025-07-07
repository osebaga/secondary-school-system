<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Gpa extends Model
{

    use HasFactory;


    protected $fillable=[
         'college_id',
         'year_id',
         'sup_gpa',
         'continue_gpa',
    ];
    public function scopeAcademicYear($query){
        return $query->where('gpas.year_id','=',Auth::user()->staff->year_id);
    }
}
