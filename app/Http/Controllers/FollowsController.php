<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function follow($id){
        $follow_id = auth()->user()->id;
        DB::table('follows')->insert([
            'follow_id' => $follow_id,
            'follower_id' => $id
        ]);

            return redirect('/search');
    }

    public function unfollow($id){
        $follow_id = auth()->user()->id;
        DB::table('follows')
            ->where([
                ['follow_id','=',$follow_id],
                ['follower_id','=',$id],
                ])
            ->delete();

            return redirect('/search');
    }
}
