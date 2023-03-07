<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function follow(){
        return $this->belongsTo('App\Follow');
    }

    public function getTimeLines(Int $user_id, Array $follow_ids){
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at','DESC')->paginate(50);
    }

    public function getUserTimeLines(Int $active_user)
    {
        return $this->where('user_id', $active_user)->orderBy('created_at', 'DESC')->paginate(50);
    }

public function testTimeLines(Int $user_id){
    return $this->where('user_id',$user_id)->orderBy('created_at','DESC')->get();
}
}
