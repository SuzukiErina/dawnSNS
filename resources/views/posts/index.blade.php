@extends('layouts.login')

@section('content')
<div class="post-area">
    <img class="post-icon" src="images/{{$user->images}}">
  {!! Form::open(['url' => 'post/create']) !!}
  {!! Form::hidden('id',$user->id) !!}
  @foreach ($errors->get('newPost') as $error)
  <p class="error-txt">※ {{ $error }}</p>
  @endforeach
  {!! Form::textarea('newPost',null,['required','class' => 'form-control','placeholder' => '何をつぶやこうか･･･？','rows' => '3']) !!}
  <button type="submit" class="post-btn"><img src="images/post.png"></button>
  {!! Form::close() !!}
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
