<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Publisher extends Model
{
    use HasFactory;

    protected $fillable=[
        'staff_id',
        'faculty_id',
         'year_id',
         'semester',
         'yos',
         'status',
    ];
}
