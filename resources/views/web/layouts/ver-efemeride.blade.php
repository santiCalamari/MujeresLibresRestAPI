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
                            <h3 class="text-center text-info">Ver efemeride</h3>                           
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="title" class="text-info">T&iacute;tulo</label>
                                    <input class="form-control has-error" name="title" type="text" value="{{$efemeride->title}}" id="title" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    <label for="date_at" class="text-info">Fecha</label>
                                    <input class="form-control" name="date_at" type="date" value="{{$efemeride->date_at}}" id="date_at" disabled="disabled">
                                </div>                                
                                <div id="register-link" class="text-center">
                                    <a class="btn btn-secondary" href="{{ route('listado-novedades') }}" role="button">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>

