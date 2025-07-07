<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntakeCategory extends Model
{
    use HasFactory;
    protected $fillable= [
        'name','status','descriptions','year_id'
    ];
}
