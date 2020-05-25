<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;
use App\Project;

class JobCategory extends Model
{
    //fillable
    protected $fillable = ['name'];
    protected $appends = ['image_path'];

    //relationship
    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function project(){
        return $this->hasManyThrough(Project::class, Job::class);
    }
    public function getImagePathAttribute(){
        return asset('storage/images/job_category/'.$this->cover_image);
    }
}
