<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //fillable
    protected $fillable = ['rating', 'user_id', 'project_id', 'comment'];

    //relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
}
