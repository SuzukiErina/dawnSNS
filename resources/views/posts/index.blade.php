@extends('layouts.login')

@section('content')
<?php $user = Auth::user(); ?>
<div class="post-area">
    <img class="post-icon" src="{{asset ("images/dawn.png")}}">
  {!! Form::open(['url' => 'post/create']) !!}
  {!! Form::hidden('id',$user->id) !!}
  @foreach ($errors->get('newPost') as $error)
  <p class="error-txt">※ {{ $error }}</p>
  @endforeach
  {!! Form::textarea('newPost',null,['required','class' => 'form-control','placeholder' => '何をつぶやこうか･･･？','rows' => '3']) !!}
  <button type="submit" class="post-btn"><img src="{{asset ("images/post.png")}}"></button>
  {!! Form::close() !!}
</div>
<div class="posts-area">
  @foreach ($posts as $post)
  <img class="posts-icon" src="{{asset ("images/dawn.png")}}">
  {{ $post->user->username }}
  {{ $post->posts }}
  @endforeach
</div>

@endsection
