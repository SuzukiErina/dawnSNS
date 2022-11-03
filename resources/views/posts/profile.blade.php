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
      <td>
        @foreach ($errors->get('username') as $error)
          <p class="error-txt">{{ $error }}</p>
        @endforeach
      </td>
    </tr>
    <tr>
      <th>{{ Form::label('MailAdress') }}</th>
      <td>{{ Form::text('mail',$user->mail,['class' => 'input']) }}</td>
      <td>
        @foreach ($errors->get('mail') as $error)
          <p class="error-txt">{{ $error }}</p>
        @endforeach
      </td>
    </tr>
    <tr>
    <th>{{ Form::label('Password') }}</th>
    <td>{{ Form::text('password','●●●●●●●',['class' => 'input','readonly']) }}</td>
    </tr>
    <tr>
      <th>{{ Form::label('new Password') }}</th>
      <td>{{ Form::password('newPassword',['class' => 'input']) }}</td>
      <td>
        @foreach ($errors->get('newPassword') as $error)
          <p class="error-txt">{{ $error }}</p>
        @endforeach
      </td>
    </tr>
    <tr>
      <th>{{ Form::label('Bio') }}</th>
      <td>{{ Form::textarea('bio',$user->bio,['class' => 'input-bio']) }}</td>
      <td>
        @foreach ($errors->get('bio') as $error)
          <p class="error-txt">{{ $error }}</p>
        @endforeach
      </td>
    </tr>
    <tr>
      <th>{{ Form::label('Icon Image') }}</th>
      <td>{{ Form::file('image',['class' => 'input-image']) }}</td>
    </tr>
  </table>

  <button type="submit" class="pedit-btn">更新</button>

  {!! Form::close() !!}
</div>

@endsection
