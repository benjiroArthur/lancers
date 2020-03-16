<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //fillables
    protected $fillable = [
        'first_name', 'last_name', 'other_name', 'gender', 'dob', 'profile_picture'
    ];

    //relationships
    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    public function project(){
        return $this->hasMany('App\Project');
    }

}
