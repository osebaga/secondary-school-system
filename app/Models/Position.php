<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Position extends Model
{
   use HasFactory;

    protected $fillable=[
       'position_name'
    ];
}
