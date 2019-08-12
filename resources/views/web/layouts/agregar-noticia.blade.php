<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <div id="noticia">
            <div class="container">
                <div id="noticia-row" class="row justify-content-center align-items-center">
                    <div id="noticia-column" class="col-md-6">
                        <div id="noticia-box" class="col-md-12">
                            <br>
                            <h3 class="text-center text-info">Agregar noticia</h3>
                            @if(Session::has('mensaje_error'))
                            <h5 class="error">{{ Session::get('mensaje_error') }}</h5>
                            @endif
                            {{ Form::open(array('url' => '/add-noticia')) }}
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
                                    {{ Form::label('description', 'Ingrese una descripción', ['class' => 'text-info']) }}
                                    {{ Form::textarea('description', '', ['class' => 'form-control', 'rows' => 6, 'cols' => 40]) }}
                                </div>
                                <div id="register-link" class="text-center">
                                    <a class="btn btn-secondary" href="{{ route('listado-noticias') }}" role="button">Cancelar</a>
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

