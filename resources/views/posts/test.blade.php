@foreach ($posts as $post)
<p>{{$post->user->username}}</p>
<p>{{$post->posts}}</p>
<p>{{$post->created_at}}</p>
@endforeach
