<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    //fillables
    protected $fillable = [
        'first_name', 'last_name', 'other_name', 'gender', 'dob', 'profile_picture', 'email'
    ];
    protected $appends = ['full_name', 'image_path'];
    protected $with = ['portfolio', 'links', 'education'];

    public function user(){
        return $this->morphOne(User::class, 'userable');
    }

    public function education(){
        return $this->hasMany(Education::class);
    }

    public function getFullNameAttribute(){
        if($this->other_name !== null){
            return $this->first_name.' '.$this->other_name.' '.$this->last_name;
        }
        return $this->first_name.' '.$this->last_name;
    }

    public function projectApplication(){
        return $this->hasMany(ProjectApplication::class);
    }
    public function jobOffered(){
        return $this->hasMany(JobOffered::class);
    }
    public function jobProfile(){
        return $this->hasMany(JobProfile::class);
    }
    public function job_history(){
        return $this->hasMany(JobHistory::class);
    }

    public function getImagePathAttribute(){
        return asset('images/users/'.$this->profile_picture);
    }

    public function portfolio(){
        return $this->hasOne(Portfolio::class);
    }

    public function links(){
        return $this->hasMany(Link::class);
    }

}
