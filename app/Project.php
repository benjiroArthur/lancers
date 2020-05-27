<?php

namespace App;

use App\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Job;
use App\JobCategory;

class Project extends Model
{
    //fillable
    protected $fillable = ['job_id', 'description', 'client_id', 'project_title', 'project_cost', 'duration', 'approved'];

    protected $casts = [
        'approved' => 'boolean'
    ];


    protected $appends = ['image'];

    //relationships

    public function job(){
        return $this->belongsTo(Job::class);
    }

//    public function jobCategory(){
//        return $this->hasOneThrough(JobCategory::class, Job::class);
//    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function jobOffered(){
        return $this->hasOne(Client::class);
    }

    public function getImageAttribute(){
        return $this->job->category->image_path;
    }

    public function fromNowAttribute(){
        //return Carbon::now()->diffForHumans($this->created_at);
    }


}
