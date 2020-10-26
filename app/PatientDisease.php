<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDisease extends Model
{
    //
    protected $fillable = [
        'patient_id',
        'disease_id',
        'location_id',
        'season_id'
    ];
}
