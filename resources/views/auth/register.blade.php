@extends('layouts.logout')

@section('content')

<div class="register">
  {!! Form::open() !!}

  <h2>新規ユーザー登録</h2>
  <br>

  {{ Form::label('ユーザー名') }}<br>
  {{ Form::text('username',null,['class' => 'input']) }}<br>
  @foreach ($errors->get('username') as $error)
    <p class="error-txt">{{ $error }}</p>
  @endforeach
  <br>

  {{ Form::label('メールアドレス') }}<br>
  {{ Form::text('mail',null,['class' => 'input']) }}<br>
  @foreach ($errors->get('mail') as $error)
    <p class="error-txt">{{ $error }}</p>
  @endforeach
  <br>

  {{ Form::label('パスワード') }}<br>
  {{ Form::password('password',['class' => 'input']) }}<br>
  @foreach ($errors->get('password') as $error)
    <p class="error-txt">{{ $error }}</p>
  @endforeach
  <br>

  {{ Form::label('パスワード確認') }}<br>
  {{ Form::password('password-confirm',['class' => 'input']) }}<br>
  @foreach ($errors->get('password-confirm') as $error)
    <p class="error-txt">{{ $error }}</p>
  @endforeach

  <button type="submit" class="register-btn">登録</button>

  <p class="new"><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</div>

@endsection
