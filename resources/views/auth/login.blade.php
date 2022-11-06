@extends('layouts.logout')

@section('content')

<div class="login">
  {!! Form::open() !!}

  <p class="welcome">DAWNSNSへようこそ</p>
  {{ Form::label('e-mail') }}<br>
  {{ Form::text('mail',null,['class' => 'input']) }}
  <br><br>
  {{ Form::label('password') }}<br>
  {{ Form::password('password',['class' => 'input']) }}
  <br>
    @if(session('error'))
      <div class="login-error">
        {{ session('error') }}<br>
      </div>
    @endif
  <button type="submit" class="login-btn">ログイン</button>

  <p class="new"><a href="/register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}
</div>
@endsection
