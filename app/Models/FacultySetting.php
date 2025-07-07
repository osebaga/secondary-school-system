<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FacultySetting extends Model
{
    use HasFactory;


    protected $fillable=[
        'faculty_id','year_id','sem1','sem1_ca','sem2','sem2_ca',
        'sem3','sem3_ca','sem4','sem4_ca','sem1_upload','sem2_upload',
        'sem3_upload','sem4_upload','sup_upload','registration',
        'sem1_status', 'sem2_status', 'sem1_finalist', 'sem2_finalist',
        'sem1_registration','sem2_registration','batch_id'

    ];
}
