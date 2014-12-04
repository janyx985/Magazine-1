@extends ('layout')

@section ('title') Nueva publicacón @stop

@section ('content')
{{ Form::open(array('url' => 'posts')) }}
    {{ Form::text('title') }}<br />
    {{ Form::textArea('content') }}<br />
    {{ Form::submit('Guardar') }}
{{ Form::close() }}

@stop