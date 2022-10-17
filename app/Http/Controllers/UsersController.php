<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\Post;
use App\User;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        return view('users.profile');
    }

    public function search(User $user, Follow $follow){
        $user = auth()->user();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);
        $all_users = User::where('id','<>',auth()->user()->id)->paginate(10);

        return view('users.search',[
            'user' => $user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
            'all_users' => $all_users
        ]);
    }

    public function result(User $user, Follow $follow, Request $request){
        $user = auth()->user();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        $keyword = $request->input('keyword');
        $query = User::query();
        foreach ((array)$keyword as $value) {
            $query->where([
                ['username','like','%'.$value.'%'],
                ['id','<>',auth()->user()->id],
            ]);
        }
        $all_users = $query->paginate(10);

        return view('users.search',[
            'user' => $user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
            'all_users' => $all_users,
            'keyword' => $keyword
        ]);
    }
}
