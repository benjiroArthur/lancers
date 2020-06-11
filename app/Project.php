<?php

namespace App;

use App\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\JobType;
use App\JobCategory;

class Project extends Model
{
    //fillable
    protected $fillable = ['job_type_id', 'description', 'client_id', 'project_title', 'project_cost', 'duration', 'approved','status'];

    protected $casts = [
        'approved' => 'boolean'
    ];

    protected $with = ['client'];


    protected $appends = ['image'];

    //relationships

    public function jobType(){
        return $this->belongsTo(JobType::class);
    }

//    public function jobCategory(){
//        return $this->hasOneThrough(JobCategory::class, JobType::class);
//    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function jobOffered(){
        return $this->hasOne(JobOffered::class);
    }

    public function getImageAttribute(){
        return $this->jobType->category->image_path;
    }

    public function fromNowAttribute(){
        //return Carbon::now()->diffForHumans($this->created_at);
    }


    public function projectApplication(){
        return $this->hasMany(ProjectApplication::Class);
    }

    public function projectFiles(){
        return $this->hasMany(ProjectFile::class);
    }

}
