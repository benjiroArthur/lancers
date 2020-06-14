<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //fillables
    protected $fillable = ['freelancer_id', 'institution', 'qualification', 'year'];

    //relationship
    public function freelancer(){
        return $this->belongsTo(Freelancer::class);
    }
}
