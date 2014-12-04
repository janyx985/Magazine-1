@extends ('admin/layout')

<?php

    if ($user->exists):
        $form_data = array('route' => array('admin.users.update', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.users.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') {{ $action }} Usuarios @stop

@section ('content')

  <h1>{{ $action }} Usuarios</h1>

  <p>
    <a href="{{ route('admin.users.index') }}" class="btn btn-info">Lista de usuarios</a>
  </p>

{{--como yo uso la misma plantilla para crear y para editar debo agregar el @if para que la opción de eliminar se muestre sólo si el usuario está trabajando sobre un registro existente.--}}
@if ($action == 'Editar')  
{{ Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

{{ Form::model($user, $form_data, array('role' => 'form')) }}

  @include ('admin/errors', array('errors' => $errors))

  <div class="row">
      <div class="form-group col-md-4">
      {{ Form::label('name', 'Nombre completo') }}
      {{ Form::text('name', null, array('placeholder' => 'Introduzca su nombre y apellido', 'class' => 'form-control')) }}        
    </div>
      <div class="form-group col-md-4">
      {{ Form::label('username', 'Nombre de usuario') }}
      {{ Form::text('username', null, array('placeholder' => 'Introduce su mombre de usuario', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('email', 'Dirección de E-mail') }}
      {{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control')) }}
    </div>
  
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('password', 'Contraseña') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
      {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
  </div>
  {{ Form::button($action . ' usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop