<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Staff extends Model
{
    use HasFactory;

    protected $table='staffs';
    protected $fillable=[
        'salutation','department_id', 'building_id','office_room_number',
        'position_id','mobile_number','office_phone_number',
         'email_address','user_id','year_id','campus_id'
    ];
    public function scopeAcademicYear($query){
        $query->where('staffs.year_id',Auth::user()->staff->year_id);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function courses(){
        return $this->belongsToMany(Course::class)
            ->withPivot('year_id', 'assigned_by','stream')
            ->withTimestamps();
    }

    public function course(){
        return $this->hasMany(CourseStaff::class,'staff_id');
           // ->withPivot('year_id', 'assigned_by','stream')
          //  ->withTimestamps();
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'year_id');
    }

}
