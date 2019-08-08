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
                            <h3 class="text-center text-info">Editar efemeride</h3>
                            @if(Session::has('mensaje_error'))
                            <h5 class="error">{{ Session::get('mensaje_error') }}</h5>
                            @endif
                            {{ Form::model($efemeride, ['route' => ['edit-efemeride', $efemeride->id], 'method' => 'patch']) }}
                            <div class="form-group">
                                <div class="form-group">
                                    {{ Form::label('title', 'Ingrese un título', ['class' => 'text-info']) }}
                                    {{ Form::text('title', $efemeride->title, ['class' => 'form-control has-error']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('date_at', 'Ingrese una fecha', ['class' => 'text-info']) }}
                                    {{ Form::date('date_at', $efemeride->date_at, ['class' => 'form-control']) }}
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

