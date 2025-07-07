<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionCandidate extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function post()
    {

        return $this->belongsTo('App\Models\ElectionPost','post_id');
    }

    public function vote()
    {

        return $this->hasMany('App\Models\ElectionVote','candidate_id');
    }
}
