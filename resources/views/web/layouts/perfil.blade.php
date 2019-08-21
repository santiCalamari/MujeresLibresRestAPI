<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <div id="perfil">
            <div class="container">
                <div id="perfil-row" class="row justify-content-center align-items-center">
                    <div id="perfil-column" class="col-md-6">
                        <div id="perfil-box" class="col-md-12">
                            <br>
                            <h3 class="text-center text-info">Tu Perfil</h3>
                            @if(Session::has('mensaje_error'))
                            <h5 class="error">{{ Session::get('mensaje_error') }}</h5>
                            @endif
                            {{ Form::model($user, ['route' => ['edit-perfil', $user->id], 'method' => 'patch']) }}
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="usuario" class="text-info">Nombre de usuario</label>
                                    <input class="form-control has-error" name="usuario" type="text" value="{{$user->nickname}}" id="usuario" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    {{ Form::label('nombre-apellido', 'Nombre y apellido', ['class' => 'text-info']) }}
                                    {{ Form::text('nombre-apellido', $user->name, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email', ['class' => 'text-info']) }}
                                    {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('barrio', 'Barrio', ['class' => 'text-info']) }}
                                    {{ Form::text('barrio', $user->neighborhood, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('direccion', 'Dirección', ['class' => 'text-info']) }}
                                    {{ Form::text('direccion', $user->addresss, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('telefono', 'Telefono', ['class' => 'text-info']) }}
                                    {{ Form::text('telefono', $user->phone, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('celular', 'Celular', ['class' => 'text-info']) }}
                                    {{ Form::text('celular', $user->cellphone, ['class' => 'form-control']) }}
                                </div>
                                <div id="register-link" class="text-center">
                                    <a class="btn btn-secondary" href="{{ route('listado-novedades') }}" role="button">Cancelar</a>
                                    {{ Form::submit('Enviar', ['class' => 'btn btn-info btn-md']) }}
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <br>
    <br>
</html>
