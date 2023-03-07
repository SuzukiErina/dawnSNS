<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Follow;
use App\Post;
use App\User;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user, Follow $follow, Post $post){
        $user = auth()->user();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);
        $follow_ids = $follow->followIds($user->id);
        $following_ids = $follow_ids->pluck('follower_id')->toArray();
        $posts = $post->getTimeLines($user->id,$following_ids);

        return view('posts.index',[
            'user' => $user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
            'posts' => $posts
        ]);
    }

    public function create(Request $request){
            $request->validate(
            [
                'newPost' => ['required','max:150'],
            ],
            [
                'newPost.required' => '必須項目です',
                'newPost.max' => '150文字以内で入力してください',
            ]
            );

        $user_id = $request->input('id');
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => $user_id,
            'posts' => $post
        ]);

        return redirect('/top');
    }

    public function update(Request $request){
        $request->validate(
            [
                'upPost' => ['required','max:200'],
            ]
            );

        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id',$id)
            ->update(
                ['posts' => $up_post]
            );

        return redirect('/top');
    }

    public function delete($id){
        DB::table('posts')
            ->where('id',$id)
            ->delete();

        return redirect('/top');
    }

    public function profile(User $user, Follow $follow, Post $post){
        $user = auth()->user();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        return view('posts.profile',[
            'user' => $user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
        ]);
    }

    public function test(Post $post){
        $user = auth()->user();
        $posts = $post->testTimeLines($user->id);
        return view('posts.test',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
