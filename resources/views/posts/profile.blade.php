@extends('layouts.login')

@section('content')
<div class="profile-edit">
<img class="profile-icon" src="/storage/{{$user->images}}">
  {!! Form::open(['url' => 'profile/edit', 'files' => 'true']) !!}
  {!! Form::hidden('id',$user->id,['class' => 'input']) !!}
  <table>
    <tr>
      <th>{{ Form::label('UserName') }}</th>
      <td>{{ Form::text('username',$user->username,['class' => 'input']) }}</td>
    </tr>
    @foreach ($errors->get('username') as $error)
      <tr>
        <td class="error-td"></td>
        <td class="error-td">
          <p class="error-txt">{{ $error }}</p>
        </td>
      </tr>
    @endforeach
    <tr>
      <th>{{ Form::label('MailAdress') }}</th>
      <td>{{ Form::text('mail',$user->mail,['class' => 'input']) }}</td>
    @foreach ($errors->get('mail') as $error)
      <tr>
        <td class="error-td"></td>
        <td class="error-td">
          <p class="error-txt">{{ $error }}</p>
        </td>
      </tr>
    @endforeach
    <tr>
    <th>{{ Form::label('Password') }}</th>
    <td>{{ Form::text('oldPassword','●●●●●●●',['class' => 'input','readonly']) }}</td>
    </tr>
    <tr>
      <th>{{ Form::label('new Password') }}</th>
      <td>{{ Form::password('password',['class' => 'input']) }}</td>
    @foreach ($errors->get('newPassword') as $error)
      <tr>
        <td class="error-td"></td>
        <td class="error-td">
          <p class="error-txt">{{ $error }}</p>
        </td>
      </tr>
    @endforeach
    <tr>
      <th>{{ Form::label('Bio') }}</th>
      <td>{{ Form::textarea('bio',$user->bio,['class' => 'input-bio']) }}</td>
    @foreach ($errors->get('bio') as $error)
      <tr>
        <td class="error-td"></td>
        <td class="error-td">
          <p class="error-txt">{{ $error }}</p>
        </td>
      </tr>
    @endforeach
    <tr>
      <th>{{ Form::label('Icon Image') }}</th>
      <td>{{ Form::file('image',['class' => 'input-image']) }}</td>
    @foreach ($errors->get('image') as $error)
      <tr>
        <td class="error-td"></td>
        <td class="error-td">
          <p class="error-txt">{{ $error }}</p>
        </td>
      </tr>
    @endforeach
  </table>

  <button type="submit" class="pedit-btn">更新</button>

  {!! Form::close() !!}
</div>

@endsection
