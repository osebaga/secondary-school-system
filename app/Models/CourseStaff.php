<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CourseStaff extends Model
{
    use HasFactory;


    protected $table='course_staff';
    protected $fillable=[
        'year_id',
        'staff_id',
        'course_id',
        'assigned_by',
        'stream',
    ];
}
