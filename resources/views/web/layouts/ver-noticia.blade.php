<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <br>
    <br>
    <br>
    <body>
        <div id="noticia">
            <div class="container">
                <div id="noticia-row" class="row justify-content-center align-items-center">
                    <div id="noticia-column" class="col-md-6">
                        <div id="noticia-box" class="col-md-12">
                            <br>
                            <h3 class="text-center text-info">Ver noticia</h3>                           
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="title" class="text-info">T&iacute;tulo</label>
                                    <input class="form-control has-error" name="title" type="text" value="{{$noticia->title}}" id="title" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    <label for="date_at" class="text-info">Fecha</label>
                                    <input class="form-control" name="date_at" type="date" value="{{$noticia->date_at}}" id="date_at" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="text-info">Descripci&oacute;n</label>
                                    <textarea class="form-control" rows="6" cols="40" name="descrition" disabled="disabled">{{$noticia->description}}</textarea>
                                </div>
                                <div id="register-link" class="text-center">
                                    <a class="btn btn-secondary" href="{{ route('listado-noticias') }}" role="button">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>

