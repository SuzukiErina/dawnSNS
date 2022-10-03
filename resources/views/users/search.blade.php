@extends('layouts.login')

@section('content')
<div class="search-form">
  {!! Form::open(['url' => 'user/search']) !!}
  {!! Form::textarea('userSearch',null,['required','class' => 'searchform-control','placeholder' => 'ユーザー名']) !!}
  <button type="submit" class="post-btn"><img src="images/post.png"></button>
  {!! Form::close() !!}
</div>

@endsection
