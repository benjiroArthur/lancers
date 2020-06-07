<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffered extends Model
{
    //fillable
    protected $fillable = ['project_id', 'freelancer_id', 'status'];

    //relationship

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }
     public function freelancer(){
        return $this->belongsTo(Freelancer::class, 'freelancer_id');
    }



}
