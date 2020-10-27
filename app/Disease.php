<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    //
    protected $fillable = [
        'disease_name',
        'disease_summery'
    ];
}