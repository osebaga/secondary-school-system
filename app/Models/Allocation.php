<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    // protected $guarded = ['*'];
    protected $guarded = [];


    public function block()
    {
        return $this->belongTo(Block::class);
    }

    public function hostel()
    {
        return $this->belongTo(Hostel::class);
    }

    public function room()
    {
        return $this->belongTo(Room::class);
    }
}
