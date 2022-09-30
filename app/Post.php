<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getTimeLines(Int $user_id,Array $follow_ids){
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id',$follow_ids)->orderBy('created_at','desc');
    }
}
