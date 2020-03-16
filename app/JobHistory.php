<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    //fillables
    protected $fillable = ['project_name', 'freelancer_id'];

    //relationships
    public function freelancer(){
        return $this->belongsTo('App\Freelancer');
    }
}
