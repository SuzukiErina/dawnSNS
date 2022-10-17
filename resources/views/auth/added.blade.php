@extends('layouts.logout')

@section('content')

<div id="clear">
<p class="name">{{Session::get('username')}}さん</p>
<br>
<p>ようこそ！DAWNSNSへ！</p>
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう。</p>

<button class="back-btn" onclick="location.href='/login'">ログイン画面へ</button>
</div>

@endsection
