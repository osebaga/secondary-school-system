<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $guarded = [];

    // A Center belongs to a Campus
    public function campus(){
        return $this->belongsTo(Campus::class);
    }
}
