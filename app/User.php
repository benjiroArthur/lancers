<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_verified_at', 'email', 'password', 'role_id', 'userable_id', 'userable_type', 'profile_updated', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'profile_updated' => 'boolean',
        'active' => 'boolean'
    ];

    //relationships
    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function userable(){
        return $this->morphTo();
    }

    public function address(){
        return $this->hasOne('App\Address');
    }
     public function account(){
        return $this->hasOne('App\AccountDetails');
    }

    public function friendOfMine(){
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendOf(){
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends(){
        return $this->friendOfMine()->merge($this->friendOf());
    }

//    public function sender(){
//        return $this->hasMany('App\Paymentr', 'payments', 'user_id', 'sender_id');
//    }
//
//    public function receiver(){
//            return $this->belongsToMany('App\User', 'payments', 'user_id', 'receiver_id');
//        }

}
