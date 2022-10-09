<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function follows(){
        return $this->hasMany('App\Follow');
    }

    public function follow(Int $user_id){
        return $this->follows()->attach($user_id);
    }

    public function unfollow(Int $user_id){
        return $this->follows()->detach($user_id);
    }

    // public function isFollowing(Int $user_id){
    //     return $this->follows()->where('follower_id',$user_id)->exists();
    // }

    // public function isFollowed(Int $user_id){
    //     return (boolean) $this->follows()->where('follower_id',$user_id)->first(['id']);
    // }
}
