<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    //fillable
    protected $fillable = ['question', 'answer'];
}
