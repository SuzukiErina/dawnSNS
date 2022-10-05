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
      <button type="button" class="modal-open edit-btn" data-toggle="modal" data-target="#editModal" data-id="{{ $post->id }}" data-posts="{{ $post->posts }}"><img src="images/edit.png"></button>
      <a class="delete-btn" href="/post/{{ $post->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいですか？')"><img src="images/trash_h.png"></a>
    </div>
    @endif
  </div>
</div>
<hr class="posts-border">

<!-- ▼ Bootstrap データの受け渡しを含むモーダル ▼ -->
    <script>
    $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
  var id = button.data('id') //data-whatever の値を取得
  var posts = button.data('posts')

  var modal = $(this)  //モーダルを取得
  modal.find('.editform-id').val(id)  //IDの受け渡し
  modal.find('.editform-posts').val(posts)
})
    </script>
<!-- ▲ Bootstrap データの受け渡しを含むモーダル ▲ -->

<!-- ▼ モーダル部分 ▼ -->
<div class="overlay"></div>
<div class="modal" id="editModal">
  <div class="post-edit">
    <button class="modal-close" data-dismiss="modal">
      <span></span>
      <span></span>
    </button>
    {!! Form::open(['url' => 'post/update']) !!}
    {!! Form::hidden('id',$post->id,['class' => 'editform-id']) !!}
    {!! Form::textarea('upPost',$post->posts,['class' => 'editform-posts','rows' => '3']) !!}
    <button type="submit" class="update-btn edit-btn"><img src="images/edit.png"></button>
    {!! Form::close() !!}
  </div>
</div>
<!-- ▲ モーダル部分 ▲ -->

@endforeach

@endsection
