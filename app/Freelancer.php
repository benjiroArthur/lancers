<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    //fillables
    protected $fillable = [
        'first_name', 'last_name', 'other_name', 'gender', 'dob', 'profile_picture', 'email'
    ];
    protected $appends = ['full_name'];

    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    public function getFullNameAttribute(){
        if($this->other_name !== null){
            return $this->first_name.' '.$this->other_name.' '.$this->last_name;
        }
        return $this->first_name.' '.$this->last_name;
    }

    public function project_apply(){
        return $this->hasMany('App\ProjectApplication');
    }
    public function jobOffered(){
        return $this->hasMany('App\JobOffered');
    }
    public function jobProfile(){
        return $this->hasMany('App\JobProfile');
    }
    public function job_history(){
        return $this->hasMany('App\JobHistory');
    }

    public function getProfilePictureAttribute($val){
        return asset('storage/images/users/'.$val);
    }

}
