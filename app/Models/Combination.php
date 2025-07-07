<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{
    use HasFactory;
    protected $fillable = [
        'combination_code',
        'description',
        'programme_id'
    ];

    public function programs(){
        return $this->belongsTo(Program::class, 'programme_id');
    }
}
