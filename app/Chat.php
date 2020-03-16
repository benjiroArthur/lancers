<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //fillable
    protected $fillable = ['user_id', 'friend_id', 'chat'];

    //relationship
}
