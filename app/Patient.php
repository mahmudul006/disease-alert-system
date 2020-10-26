<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
        'patient_name',
        'patient_email',
        'patient_dob',
        'password'
    ];
}
