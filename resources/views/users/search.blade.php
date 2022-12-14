@extends('layouts.login')

@section('content')
<div class="search-form">
  {!! Form::open(['url' => 'result']) !!}
  {!! Form::text('keyword',null,['required','class' => 'searchform-control','placeholder' => 'ユーザー名']) !!}
  <button type="submit" class="search-btn">検 索</button>
  {!! Form::close() !!}
  @if (isset($keyword))
  <p class="keyword">検索ワード：{{$keyword}}</p>
  @endif
</div>
@foreach ($all_users as $active_user)
<div class="users-area">
  <img class="users-icon" src="storage/{{$active_user->images}}">
  {{ $active_user->username }}
  <div class="btn-area">
    @if (DB::table('follows')->where([
                              ['follow_id','=',$user->id],
                              ['follower_id','=',$active_user->id],
                              ])
                              ->exists())
    <button class="unfollow-btn" onclick="location.href='/{{$active_user->id}}/unfollow'">フォロー解除</button>
    @else
    <button class="follow-btn" onclick="location.href='/{{$active_user->id}}/follow'">フォローする</button>
    @endif
  </div>
</div>
@endforeach

@endsection
