<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = [
        'doctor_name',
        'doctor_email',
        'phone_number',
        'password'
        // add all other fields
    ];
}
