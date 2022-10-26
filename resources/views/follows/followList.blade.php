@extends('layouts.login')

@section('content')
<div class="follow-list">
  <p>Follow list</p>
  <div class="icon-area">
    @foreach ($follows as $follow)
    <a href="#"><img class="follow-icon" src="images/{{$follow->images}}"></a>
    @endforeach
  </div>
</div>
@foreach ($posts as $post)
<div class="posts-area">
  <img class="posts-icon" src="images/{{$post->user->images}}">
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
