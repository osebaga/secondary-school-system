<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semesters';
    protected $guarded = ['id'];

    public function getStatusNameAttribute(){
        if($this->status == 1){
            return 'Active';
        }else{
            return 'Not Active';
        }
    }
}
