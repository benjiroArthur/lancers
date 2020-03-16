<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //fillable
    protected $fillable = ['sender_id', 'receiver_id', 'project_id', 'amount', 'status'];


}
