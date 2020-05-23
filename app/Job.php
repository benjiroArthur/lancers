<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //fillables
    protected $fillable = ['name', 'job_category_id'];

    //relationships
    public function category(){
        return $this->belongsTo('App\JobCategory');
    }

    public function project(){
        return $this->hasMany('App\Project');
    }

}
