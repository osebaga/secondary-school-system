<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnpaidStudent extends Model
{
    use HasFactory;
    protected $guarded = [];




    public function student()
    {
        return $this->belongsTo(Student::class,'reg_no','reg_no');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'blocked_by');
    }

    public function user2()
    {
        return $this->belongsTo(User::class,'unblocked_by');
    }
}
