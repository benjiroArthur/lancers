<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    //fillable
    protected $fillable = ['country', 'zip_code'];
}
