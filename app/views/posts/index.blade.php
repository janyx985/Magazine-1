@extends('layout')

@section ('title') Publicaciones @stop

@section('content')
<a href="posts/create">Agregar publicación</a>
<ul>
	@foreach($posts as $post)
	<li>
		<!-- <a href="posts/{{ $post->id }}">{{ $post->title }}</a> -->

		<a href="{{ URL::to('/posts/' . $post->id) }}">{{ $post->title }}</a>

	</li>
	@endforeach
	
</ul>
@stop