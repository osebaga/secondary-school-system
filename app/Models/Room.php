<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // protected $guarded = ['*'];
     protected $fillable = [
         'hostel_id',
         'block_id',
         'room_number',
         'floor_name',
         'capacity'
         
     ];

    public function allocations()
    {
        return $this->belongTo(Allocation::class);
    }

    public function hostel()
    {
        return $this->belongTo(Hostel::class);
    }

    public function block()
    {
        return $this->belongTo(Block::class);
    }
}
