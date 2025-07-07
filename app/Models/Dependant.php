<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependant extends Model
{
    use HasFactory;
    protected $fillable = ['reg_no','name','gender','relationship','address','phone1','phone2','job'];

}
