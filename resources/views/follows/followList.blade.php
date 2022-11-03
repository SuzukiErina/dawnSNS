@extends('layouts.login')

@section('content')
<div class="follow-list">
  <p>Follow list</p>
  <div class="icon-area">
    @foreach ($follows as $follow)
    <a href="/{{$follow->id}}/profile"><img class="follow-icon" src="storage/{{$follow->images}}"></a>
    @endforeach
  </div>
</div>
@foreach ($posts as $post)
<div class="posts-area">
  <a href="/{{$post->user->id}}/profile"><img class="posts-icon" src="storage/{{$post->user->images}}"></a>
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
