<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <br>
    <br>
    <br>
    <body>
        <div id="evento">
            @if(Session::has('mensaje_error'))
            {{ Session::get('mensaje_error') }}
            @endif
            <div class="container">
                <div id="evento-row" class="row justify-content-center align-items-center">
                    <div id="evento-column" class="col-md-6">
                        <div id="evento-box" class="col-md-12">
                            <form id="evento-form" class="form" action="" method="post">
                                <h3 class="text-center text-info">Agregar evento</h3>
                                {{ Form::open(array('url' => '/login')) }}
                                <div class="form-group">
                                    {{ Form::label('titulo', 'Ingrese un título', ['class' => 'text-info']) }}
                                    {{ Form::text('titulo', '', ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('fecha', 'Ingrese una fecha', ['class' => 'text-info']) }}
                                    {{ Form::date('deadline', new \DateTime(), ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('lugar', 'Ingrese un Lugar', ['class' => 'text-info']) }}
                                    {{ Form::text('lugar', '',['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('descripcion', 'Ingrese una descripción', ['class' => 'text-info']) }}
                                    {{ Form::textarea('descripcion', '', ['class' => 'form-control', 'rows' => 6, 'cols' => 40]) }}
                                </div>
                                <div id="register-link" class="text-center">
                                    <a class="btn btn-secondary" href="{{ route('listado-novedades') }}" role="button">Cancelar</a>
                                    {{ Form::submit('Enviar', ['class' => 'btn btn-info btn-md']) }}
                                </div>
                                {{ Form::close() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

