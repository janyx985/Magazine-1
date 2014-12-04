<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="shortcut icon" type="image/x-icon" href="http://transparencia.utem.cl/wp-content/themes/transparenciautem/favicon.ico">
        {{ HTML::style('css/bootstrap.min.css'); }}
    </head>
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                    @if(Session::has('mensaje_error'))
                        <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                    @endif
                    {{ Form::open(array('url' => '/login')) }}
                        <legend>Iniciar sesión</legend>
                        <div class="form-group">
                            {{ Form::label('usuario', 'Nombre de usuario') }}
                            {{ Form::text('username', Input::old('username'), array('class' => 'form-control')); }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('contraseña', 'Contraseña') }}
                            {{ Form::password('password', array('class' => 'form-control')); }}
                        </div>
                        <div class="checkbox">
                            <label>
                                {{ Form::checkbox('rememberme', true) }}
                                Recordar contraseña
                            </label>
                        </div>
                        
                         {{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}
                        <div>
                            <label>
                                
                            </label>
                        </div>
                        <div>
                            <label>
                                <a href="logout">¿Olvidó su contraseña?</a>
                            </label>
                        </div>
                        <div>
                            <label>
                                <a href="logout">Registrarme</a>
                            </label>
                        </div>
                       
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery.js"></script>
        {{ HTML::script('js/bootstrap.js'); }}
    </body>
</html>