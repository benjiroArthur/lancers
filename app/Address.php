<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //fillables
    protected $fillable = [
        'country', 'zip_code', 'city', 'phone_number', 'user_id'
    ];


    //relationship
    public function user(){
        return $this->belongsTo('App\User');
    }
}
