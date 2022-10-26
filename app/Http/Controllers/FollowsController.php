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

    public function followList(User $user, Follow $follow, Post $post){
        $user = auth()->user();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);
        $follow_ids = $follow->followIds($user->id);
        $following_ids = $follow_ids->pluck('follower_id')->toArray();
        $posts = $post->getTimeLines($user->id,$following_ids);
        $follows = $user->getFollows($user->id,$following_ids);

        return view('follows.followList',[
            'user' => $user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
            'follows' => $follows,
            'posts' => $posts
        ]);
    }

    public function followerList(User $user, Follow $follow, Post $post){
        $user = auth()->user();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);
        $follower_ids = $follow->followerIds($user->id);
        $followed_ids = $follower_ids->pluck('follow_id')->toArray();
        $posts = $post->getTimeLines($user->id,$followed_ids);
        $followers = $user->getFollowers($user->id,$followed_ids);

        return view('follows.followerList',[
            'user' => $user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
            'followers' => $followers,
            'posts' => $posts
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
