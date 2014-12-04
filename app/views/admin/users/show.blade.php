@extends ('admin/layout')

@section ('title') User {{ $user->full_name }} @stop

@section ('content')

<h2>Usuario #{{ $user->id }}</h2>

<p>Nombre: {{ $user->name }}</p>
<p>Nombre de usuario: {{ $user->username }}</p>
<p>Email: {{ $user->email }}</p>

<p>
  <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

	{{ Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE'), array('role' => 'form')) }}
    	{{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop