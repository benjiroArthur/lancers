<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //fillables
    protected $fillable = [
        'first_name', 'last_name', 'other_name', 'gender', 'dob', 'profile_picture', 'email'
    ];

    //relationships
    public function user(){
        return $this->morphOne(User::class, 'userable');
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function jobOffered(){
        return $this->hasManyThrough(JobOffered::class, Project::class);
    }

    public function getProfilePictureAttribute($val){
        return asset('storage/images/users/'.$val);
    }

}
