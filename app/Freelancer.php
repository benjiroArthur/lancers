<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    //fillables
    protected $fillable = [
        'first_name', 'last_name', 'other_name', 'gender', 'dob', 'profile_picture', 'email'
    ];

    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    public function project_apply(){
        return $this->hasMany('App\ProjectApplication');
    }
    public function job_offered(){
        return $this->hasMany('App\JobOffered');
    }
    public function job_profile(){
        return $this->hasMany('App\JobProfile');
    }
    public function job_history(){
        return $this->hasMany('App\JobHistory');
    }


}
