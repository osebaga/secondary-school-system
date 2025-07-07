<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Campus extends Model
{
    use HasFactory;

    protected $fillable=[
     'institution_id', 'campus_name','campus_acronym'
  ];

  public function institution(){
      return $this->belongsTo(Institution::class);
  }

  public  function cost(){
      return $this->hasOne(DirectCost::class);
  }

  public  function faculties(){
      return $this->hasMany(Faculty::class);
  }

    // A Campus has many Centers
  public  function centers(){
    return $this->hasMany(Center::class);
}
}
