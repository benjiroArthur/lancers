<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //fillables
    protected $fillable = [
        'first_name', 'last_name', 'other_name', 'gender', 'dob', 'profile_picture'
    ];

    public function user(){
        return $this->morphOne('App\User', 'userable');
    }




}
