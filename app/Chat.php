<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //fillable
    protected $fillable = ['from', 'to', 'chat'];

    //relationship
    protected $appends = ['from_now'];
    protected $with = ['fromContact'];

    public function fromContact(){
        return $this->hasOne(User::class, 'id', 'from');
    }
    public function getFromNowAttribute(){
        if($this->created_at == Carbon::today()){
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('H:i');
        }
        else if($this->created_at > Carbon::today() && $this->created_at == date('Y')){
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d M');
        }
        else{
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d M Y');
        }

    }
}
