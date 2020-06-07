<?php

namespace App;

use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

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

    //return with
    protected $with = ['userable', 'address'];

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
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function friendOf(){
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }

    /*public function friends(){
        return $this->friendsOfMine->merge($this->friendOf);
    }*/

    public function getFriendsAttribute(){
        $friendsOfMine = $this->friendOfMine;
        $friendOf = $this->friendOf;
        return $friendsOfMine->merge($friendOf);
    }

//    public function sender(){
//        return $this->hasMany('App\Paymentr', 'payments', 'user_id', 'sender_id');
//    }
//
//    public function receiver(){
//            return $this->belongsToMany('App\User', 'payments', 'user_id', 'receiver_id');
//        }

    public function sendPasswordResetNotification($token){
       $this->notify(new PasswordResetNotification($token));
    }

    /*public function getFriendsAttribute(){
        $friendsOfMine = $this->friendsOfMine;
        $friendOf = $this->friendOf;
        return $friendsOfMine->merge($friendOf);
    }*/
}
