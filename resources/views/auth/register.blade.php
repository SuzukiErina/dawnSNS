@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}<br>
@foreach ($errors->get('username') as $error)
  <p class="error-txt">{{ $error }}</p>
@endforeach
<br>

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}<br>
@foreach ($errors->get('mail') as $error)
  <p class="error-txt">{{ $error }}</p>
@endforeach
<br>

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}<br>
@foreach ($errors->get('password') as $error)
  <p class="error-txt">{{ $error }}</p>
@endforeach
<br>

{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}<br>
@foreach ($errors->get('password-confirm') as $error)
  <p class="error-txt">{{ $error }}</p>
@endforeach
<br>

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
