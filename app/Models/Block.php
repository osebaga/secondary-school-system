<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    // protected $guarded = ['*'];

        protected $fillable = 
        [
            'hostel_id',
            'block_name',
            'block_capacity',
            'number_of_floor',
            'number_of_room'

        ];

   public function hostel()
   {
       return $this->belongTo(Hostel::class);

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

