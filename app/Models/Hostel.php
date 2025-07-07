<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable= 
    [
        'code',
        'hostel_name',
        'location',
        'hostel_capacity',
        'address'

    ];

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }


    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    
}
