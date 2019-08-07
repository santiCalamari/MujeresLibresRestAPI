<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <br>
    <br>
    <br>
    <body>
        <div id="login">
            @if(Session::has('mensaje_error'))
            {{ Session::get('mensaje_error') }}
            @endif
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <h3 class="text-center text-info">Iniciar Sesión</h3>
                            {{ Form::open(array('url' => '/login')) }}
                            <div class="form-group">
                                {{ Form::label('usuario', 'Nombre de usuario', ['class' => 'text-info']) }}
                                {{ Form::text('username', Request::old('username'), ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('contraseña', 'Contraseña', ['class' => 'text-info']) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('lblRememberme', 'Recordar contraseña', ['class' => 'text-info']) }}
                                {{ Form::checkbox('rememberme', true) }}                                   
                            </div>
                            <div id="register-link" class="text-right">
                                <a class="btn btn-secondary" href="#">¿Olvide mi contraseña?</a>
                                {{ Form::submit('Enviar', ['class' => 'btn btn-info btn-md']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

