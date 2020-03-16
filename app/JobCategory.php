<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    //fillable
    protected $fillable = ['name'];

    //relationship
    public function job(){
        return $this->hasMany('App\Job');
    }

    public function project(){
        return $this->hasManyThrough('App\Project', 'App\Job');
    }
}
