<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //fillables
    protected $fillable = [
        'first_name', 'last_name', 'other_name', 'gender', 'dob', 'profile_picture', 'email'
    ];

    //appends
    protected $appends = ['full_name', 'image_path'];

    //relationships
    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    public function getImagePathAttribute(){
        if ($this->profile_picture === 'noimage.jpg'){
            return asset('images/'.$this->profile_picture);
        }
        return asset('storage/images/users/'.$this->profile_picture);
    }

    public function getFullNameAttribute(){
        if($this->other_name !== null){
            return $this->first_name.' '.$this->other_name.' '.$this->last_name;
        }
        return $this->first_name.' '.$this->last_name;
    }


}
