<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invoice() {
        return $this->belongsTo(Invoice::class, 'paymentReference', 'control_number');
    }
}
