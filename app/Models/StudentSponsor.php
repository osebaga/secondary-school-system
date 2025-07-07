<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSponsor extends Model
{
    use HasFactory;
    protected $fillable =[
        'reg_no','address','sponsor_type','name','phone','occupation','email','sponsor_id'
    ];

    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }
}
