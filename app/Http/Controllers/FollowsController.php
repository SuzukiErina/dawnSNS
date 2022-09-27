<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\Post;
use App\User;

class FollowsController extends Controller
{
    //
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function followList(User $user, Follow $follow){
        $user = auth()->user();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        return view('follows.followList',[
            'user' => $user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

    public function followerList(User $user, Follow $follow){
        $user = auth()->user();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        return view('follows.followerList',[
            'user' => $user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
}
