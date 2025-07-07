<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    protected $fillable=[
        'name','guard_name'];
    public static function defaultRoles()
    {
        return [
            'SuperAdmin',
            'Student',
            'User',
            'ExamOfficer',
            'Lecturer',
            'Registrar',
            'TimetableMaster',
            'Accountant',
            'Accommodation',
            'OAS'
        ];
    }
}
