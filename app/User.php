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

    public function getFollows(Int $user_id, Array $follow_ids){
        return $this->whereIn('id', $follow_ids)->orderBy('created_at','DESC')->get();
    }

    public function getFollowers(Int $user_id, Array $follower_ids){
        return $this->whereIn('id', $follower_ids)->orderBy('created_at','DESC')->get();
    }

}
