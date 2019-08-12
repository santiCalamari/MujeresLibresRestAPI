<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <div id="evento">
            <div class="container">
                <div id="evento-row" class="row justify-content-center align-items-center">
                    <div id="evento-column" class="col-md-6">
                        <div id="evento-box" class="col-md-12">
                            <br>
                            <h3 class="text-center text-info">Agregar evento</h3>
                            @if(Session::has('mensaje_error'))
                            <h5 class="error">{{ Session::get('mensaje_error') }}</h5>
                            @endif
                            {{ Form::open(array('url' => '/add-evento')) }}
                            <div class="form-group">
                                <div class="form-group">
                                    {{ Form::label('title', 'Ingrese un título', ['class' => 'text-info']) }}
                                    {{ Form::text('title', '', ['class' => 'form-control has-error']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('date_at', 'Ingrese una fecha', ['class' => 'text-info']) }}
                                    {{ Form::date('date_at', new \DateTime(), ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('address', 'Ingrese un Lugar', ['class' => 'text-info']) }}
                                    {{ Form::text('address', '',['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description', 'Ingrese una descripción', ['class' => 'text-info']) }}
                                    {{ Form::textarea('description', '', ['class' => 'form-control', 'rows' => 6, 'cols' => 40]) }}
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
    </body>
</html>

