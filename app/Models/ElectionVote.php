<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionVote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function candidate()
    {

        return $this->belongsTo('App\Models\ElectionCandidate','candidate_id');
    }
}
