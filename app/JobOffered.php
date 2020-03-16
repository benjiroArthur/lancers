<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffered extends Model
{
    //fillable
    protected $fillable = ['project_id', 'freelancer_id'];

    //relationship
    
    public function project(){
        return $this->belongsTo('App\Project');
    }
     public function freelancer(){
        return $this->belongsTo('App\Freelancer');
    }



}
