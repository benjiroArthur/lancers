<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    //fillables
    protected $fillable = ['waller_id', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
