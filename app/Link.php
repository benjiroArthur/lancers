<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //fillables
    protected $fillable = ['freelancer_id', 'name'];
}
