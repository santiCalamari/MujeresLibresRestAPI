<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <main role="main">
            <div class="col-12">
                <div class="jumbotron panel-mujeres-libres">
                    <div class="container">
                        <p class="display-4 text-center mujeres-libres"> Novedades - Eventos y efemérides </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-9">
                        <input class="form-control" id="filtarNovedades" type="text" placeholder="Ingrese una fecha o una descripción">
                    </div>
                    <div class="col-3">
                        <a class="btn btn-secondary" href="#" role="button">Agregar evento</a>
                        <a class="btn btn-secondary" href="#" role="button">Agregar efeméride</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12">
                <table class="table table-striped w-auto table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            @if (Auth::check())
                            <th scope="col">Día</th>
                            <th scope="col">Título</th>
                            <th scope="col">Opciones</th>
                            @else
                            <th scope="col">Día</th>
                            <th scope="col">Título</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="novedades">
                        @foreach($novedades as $k => $novedad)
                        <tr>
                            @if (Auth::check())
                            <td>{{ substr($novedad['date_at'], 8, 2) }}/{{ substr($novedad['date_at'], 5, 2) }}/{{ substr($novedad['date_at'], 0, 4) }}</td>
                            <td>{{ $novedad['title'] }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm" href="#" role="button" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a class="btn btn-secondary btn-sm" href="#" role="button" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>                                
                            </td>                            
                            @else
                            <td>{{ substr($novedad['date_at'], 8, 2) }}/{{ substr($novedad['date_at'], 5, 2) }}/{{ substr($novedad['date_at'], 0, 4) }}</td>
                            <td>{{ $novedad['title'] }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
                {{$novedades->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </main>   
</body>
</html>
@section('page-js-script')
<script type="text/javascript">
    $(document).ready(function () {
        $("#filtarNovedades").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#novedades tr").filter(function () {
                console.log($(this));
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
