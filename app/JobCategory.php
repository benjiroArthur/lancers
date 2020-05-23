<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    //fillable
    protected $fillable = ['name'];
    protected $appends = ['image_path'];

    //relationship
    public function job(){
        return $this->hasMany('App\Job');
    }

    public function project(){
        return $this->hasManyThrough('App\Project', 'App\Job');
    }
    public function getImagePathAttribute(){
        return asset('storage/images/job_category/'.$this->cover_image);
    }
}
