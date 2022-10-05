@extends('layouts.login')

@section('content')
<div class="search-form">
  {!! Form::open(['url' => 'user/search']) !!}
  {!! Form::text('userSearch',null,['required','class' => 'searchform-control','placeholder' => 'ユーザー名']) !!}
  <button type="submit" class="search-btn">検 索</button>
  {!! Form::close() !!}
</div>
@foreach ($all_users as $active_user)
<div class="users-area">
  <img class="users-icon" src="images/{{$active_user->images}}">
  {{ $active_user->username }}
</div>
@endforeach

@endsection
