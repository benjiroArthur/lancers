<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //fillable
    protected $fillable = ['job_id', 'description', 'client_id', 'project_cost', 'duration', 'approved'];

    protected $casts = [
        'approved' => 'boolean'
    ];

    //relationships

    public function job(){
        return $this->belongsTo('App\Job');
    }

    public function category(){
        return $this->hasOneThrough('App\JobCategory', 'App\Job');
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }


}
