<?php

namespace App\Models;

use App\Traits\CheckCampusTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Campus;


/**
 * @property mixed $programs
 */
class Faculty extends Model
{
    use CheckCampusTrait,HasFactory;


    protected $fillable=[
        'institution_id',
        'campus_id',
        'faculty_name' ,
        'faculty_acronym',
    ];
    public function scopeCheckCampus($query){
        if ($this->checkCampus(Auth::user()->staff->campus_id)){
            return $query->where('id','=',Auth::user()->staff->campus_id);
        }
        return $query->where('id','=',Auth::user()->staff->campus_id);
    }

    public function departments(){
        return $this->hasMany(Department::class);
    }
    public function campus(){
        return $this->belongsTo(Campus::class);
    }
    public function institution(){
        return $this->belongsTo(Institution::class);
    }
    /*
     * first args is the distance relation we want to access
     *  second argment is the intermediate rel.
     * $faculty->programs
     * */
    public function programs(){
        return $this->hasMany(Program::class);

    }

}
