<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <br>
    <br>
    <br>
    <body>
        <div id="register">
            @if(Session::has('mensaje_error'))
            {{ Session::get('mensaje_error') }}
            @endif
            <div class="container">
                <div id="register-row" class="row justify-content-center align-items-center">
                    <div id="register-column" class="col-md-6">
                        <div id="register-box" class="col-md-12">
                            <br>
                            <h3 class="text-center text-info">Registrar usuario administrador</h3>
                            {{ Form::open(array('url' => '/registrarse')) }}
                            <div class="form-group">
                                {{ Form::label('usuario', 'Nombre de usuario', ['class' => 'text-info']) }}
                                {{ Form::text('username', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('contraseña', 'Contraseña', ['class' => 'text-info']) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('repetir-contraseña', 'Vuelva a ingresar la contraseña', ['class' => 'text-info']) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('nombre-apellido', 'Nombre y apellido', ['class' => 'text-info']) }}
                                {{ Form::text('nombre-apellido', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'Email', ['class' => 'text-info']) }}
                                {{ Form::text('email', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('barrio', 'Barrio', ['class' => 'text-info']) }}
                                {{ Form::text('barrio', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('direccion', 'Dirección', ['class' => 'text-info']) }}
                                {{ Form::text('direccion', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('telefono', 'Telefono', ['class' => 'text-info']) }}
                                {{ Form::text('telefono', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('celular', 'Celular', ['class' => 'text-info']) }}
                                {{ Form::text('celular', '', ['class' => 'form-control']) }}
                            </div>
                            <div id="register-link" class="text-right">
                                <a class="btn btn-secondary" href="{{ route('inicio') }}" role="button">Cancelar</a>
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
