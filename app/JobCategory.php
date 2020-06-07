<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JobType;
use App\Project;

class JobCategory extends Model
{
    //fillable
    protected $fillable = ['name'];
    protected $appends = ['image_path'];

    //relationship
    public function jobTypes(){
        return $this->hasMany(JobType::class);
    }

    public function project(){
        return $this->hasManyThrough(Project::class, JobType::class);
    }
    public function getImagePathAttribute(){
        return asset('storage/images/job_category/'.$this->cover_image);
    }
}
