@extends('layouts.login')

@section('content')
<div class="post-area">
    <img class="post-icon" src="images/{{$user->images}}">
  {!! Form::open(['url' => 'post/create']) !!}
  {!! Form::hidden('id',$user->id) !!}
  @foreach ($errors->get('newPost') as $error)
  <p class="error-txt">※ {{ $error }}</p>
  @endforeach
  {!! Form::textarea('newPost',null,['class' => 'form-control','placeholder' => '何をつぶやこうか･･･？','rows' => '3']) !!}
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
    @if ($post->user->id === Auth::user()->id)
    <div class="posts-bottom">
      <a class="edit-btn" href="#"><img src="images/edit.png"></a>
      <a class="delete-btn" href="/post/{{ $post->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいですか？')"><img src="images/trash_h.png"></a>
    </div>
    @endif
  </div>
</div>
<div class="modal"></div>
<div class="post-edit">
  {!! Form::open(['url' => 'post/edit']) !!}
  {!! Form::hidden('id',$user->id) !!}
  {!! Form::textarea('editPost',null,['class' => 'editform-control','placeholder' => '$post->posts','rows' => '3']) !!}
  <button type="submit" class="edit-btn"><img src="images/edit.png"></button>
  {!! Form::close() !!}
</div>
<hr class="posts-border">
@endforeach

@endsection
