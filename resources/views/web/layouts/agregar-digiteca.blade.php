<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <div id="digiteca">
            <div class="container">
                <div id="digiteca-row" class="row justify-content-center align-items-center">
                    <div id="digiteca-column" class="col-md-6">
                        <div id="digiteca-box" class="col-md-12">
                            <br>
                            <h3 class="text-center text-info">Agregar digiteca</h3>
                            @if(Session::has('mensaje_error'))
                            <h5 class="error">{{ Session::get('mensaje_error') }}</h5>
                            @endif
                            {{ Form::open(array('url' => '/add-digiteca')) }}
                            <div class="form-group">
                                <div class="form-group">
                                    {{ Form::label('name', 'Ingrese un título', ['class' => 'text-info']) }}
                                    {{ Form::text('name', '', ['class' => 'form-control has-error']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('web_site', 'Ingrese un sitio web', ['class' => 'text-info']) }}
                                    {{ Form::text('web_site', '', ['class' => 'form-control has-error']) }}
                                </div>                             
                                    <div id="register-link" class="text-center">
                                    <a class="btn btn-secondary" href="{{ route('informate') }}" role="button">Cancelar</a>
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

