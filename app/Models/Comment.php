<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;


    protected $fillable=[
        'staff_id','reg_no','year_id','section','comment'
    ];

}
