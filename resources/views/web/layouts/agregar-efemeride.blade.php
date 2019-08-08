<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <br>
    <br>
    <br>
    <body>
        <div id="efemeride">
            <div class="container">
                <div id="efemeride-row" class="row justify-content-center align-items-center">
                    <div id="efemeride-column" class="col-md-6">
                        <div id="efemeride-box" class="col-md-12">
                            <br>
                            <h3 class="text-center text-info">Agregar efeméride</h3>
                            @if(Session::has('mensaje_error'))
                            <h5 class="error">{{ Session::get('mensaje_error') }}</h5>
                            @endif
                            {{ Form::open(array('url' => '/add-efemeride')) }}
                            <div class="form-group">
                                {{ Form::label('title', 'Ingrese un título', ['class' => 'text-info']) }}
                                {{ Form::text('title', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('date_at', 'Ingrese una fecha', ['class' => 'text-info']) }}
                                {{ Form::date('date_at', new \DateTime(), ['class' => 'form-control']) }}                   
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


