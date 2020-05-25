<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
use App\JobCategory;

class Job extends Model
{
    //fillables
    protected $fillable = ['name', 'job_category_id'];

//    protected $with = ['category'];

    //relationships
    public function category(){
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

}
