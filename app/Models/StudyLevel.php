<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'level_name',
        'year_id'
    ];

    public function gpaClassification(){
        return $this->hasMany(GpaClassification::class);
    }
}
