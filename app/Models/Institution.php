<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;


   protected $fillable=[
       'institution_name','institution_acronym'
   ];

   public function campuses(){
       return $this->hasMany(Campus::class);
   }
   public function faculties(){
       return  $this->hasMany(Faculty::class);
   }
}
