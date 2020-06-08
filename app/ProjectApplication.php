<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectApplication extends Model
{
    //fillables
    protected $fillable = ['project_id', 'freelancer_id'];

    //relationships

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function freelancer(){
        return $this->belongsTo(Freelancer::class);
    }
}
