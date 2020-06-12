<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //fillables
    protected $fillable = ['freelancer_id', 'title', 'description', 'academic'];

    //relationships

    public function freelancer(){
        return $this->belongsTo(Freelancer::class);
    }
}
