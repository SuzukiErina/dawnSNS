<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    protected $fillable = [
        'follow_id','follower_id'
    ];

    public function getFollowCount($user_id){
        return $this->where('follow_id',$user_id)->count();
    }

    public function getFollowerCount($user_id){
        return $this->where('follower_id',$user_id)->count();
    }

    public function followIds(Int $user_id){
        return $this->where('follow_id', $user_id)->get('follower_id');
    }

    public function followerIds(Int $user_id){
        return $this->where('follower_id', $user_id)->get('follow_id');
    }
}
