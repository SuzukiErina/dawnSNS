@extends('layouts.login')

@section('content')
<div class="profile">
  <div class="profile-area">
    <img class="profile-icon" src="/images/{{$active_user->images}}"></a>
    <table>
      <tr>
        <th>Name</th>
        <td>{{$active_user->username}}</td>
      </tr>
      <tr>
        <th>Bio</th>
        <td>{{$active_user->bio}}</td>
      </tr>
    </table>
    <div class="profile-btn">
      @if ($active_user->id === Auth::user()->id)
      <button class="follow-btn" onclick="location.href='/profile'">編集する</button>
      @elseif (DB::table('follows')->where([
                                ['follow_id','=',$user->id],
                                ['follower_id','=',$active_user->id],
                                ])
                                ->exists())
      <button class="unfollow-btn" onclick="location.href='/{{$active_user->id}}/p-unfollow'">フォロー解除</button>
      @else
      <button class="follow-btn" onclick="location.href='/{{$active_user->id}}/p-follow'">フォローする</button>
      @endif
    </div>
  </div>
</div>
@foreach ($posts as $post)
<div class="posts-area">
  <a href="/{{$post->user->id}}/profile"><img class="posts-icon" src="/images/{{$post->user->images}}"></a>
  <div class="posts">
    <div class="posts-top">
      <div class="posts-username">
        {{ $post->user->username }}
      </div>
      <div class="posts-at">
        {{ $post->created_at }}
      </div>
    </div>
    {{ $post->posts }}
  </div>
</div>
<hr class="posts-border">
@endforeach

@endsection
