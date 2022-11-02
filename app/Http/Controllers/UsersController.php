<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function profile(User $user, Follow $follow, Post $post, $id){
        $user = auth()->user();
        $active_user = User::where('id','=',$id)->first();
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);
        $posts = $post->getUserTimeLines($active_user->id);

        return view('users.profile',[
            'user' => $user,
            'active_user' => $active_user,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
            'posts' => $posts
        ]);
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

    public function profileEdit(Request $request){
        $request->validate(
            [
                'username' => ['required','between:4,12'],
                'mail' => ['required','email','between:4,12'],
            ],
            [
                'username.required' => '※必須項目です',
                'username.between' => '※4文字以上、12文字以内で入力してください',
                'mail.required' => '※必須項目です',
                'mail.email' => '※メールアドレスではありません',
                'mail.between' => '※4文字以上、12文字以内で入力してください',
            ]);

        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $bio = $request->input('bio');

        DB::table('users')
            ->where('id',$id)
            ->update(
                [
                'username' => $username,
                'mail' => $mail,
                'bio' => $bio
                ]
            );

        return redirect($id.'/profile');
    }

}
