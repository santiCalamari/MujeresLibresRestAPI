<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <main role="main">
            <div class="col-12 mujeres-libres">
                <h1 class="titulo-seccion bs-docs-featurette-title"> Novedades </h1>
                <p class="slogan">Eventos y efemerides</p>
            </div>
            <br>
            <div class="col-12">
                <div class="row">
                    @if (Auth::check())
                    <div class="col-9">
                        <input class="form-control" id="filtarNovedades" type="text" placeholder="Ingrese una fecha o una descripción">
                    </div>
                    <div class="col-3">
                        <a class="btn btn-secondary" href="{{ route('agregar-evento') }}" role="button">Agregar evento</a>
                        <a class="btn btn-secondary" href="{{ route('agregar-efemeride') }}" role="button">Agregar efeméride</a>
                    </div>
                    @else
                    <div class="col-12">
                        <input class="form-control" id="filtarNovedades" type="text" placeholder="Ingrese una fecha o una descripción">
                    </div>
                    @endif
                </div>
            </div>
            <br>
            <div class="col-12">
                <table class="table table-striped w-auto table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            @if (Auth::check())
                            <th class="d-none d-print-block" scope="col">Id</th>
                            <th scope="col">Día</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Título</th>
                            <th scope="col">Opciones</th>
                            @else
                            <th scope="col">Día</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Título</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="novedades">
                        @foreach($novedades as $k => $novedad)
                        <tr>
                            @if (Auth::check())
                            <td class="d-none d-print-block">{{ $novedad['id'] }}</td>
                            <td>{{ substr($novedad['date_at'], 8, 2) }}/{{ substr($novedad['date_at'], 5, 2) }}/{{ substr($novedad['date_at'], 0, 4) }}</td>
                            @if($novedad['isNew'])<td>Evento</td>@else<td>Efeméride</td>@endif
                            <td>{{ $novedad['title'] }}</td>
                            <td>
                                <div class="btn-group">
                                    @if($novedad['isNew'])
                                    <a class="btn btn-secondary btn-sm" href="{{ route('ver-evento', $novedad['id']) }}" role="button" title="Ver"><span class="glyphicon glyphicon-info-sign"></span></a>
                                    @else
                                    <a class="btn btn-secondary btn-sm" href="{{ route('ver-efemeride', $novedad['id']) }}" role="button" title="Ver"><span class="glyphicon glyphicon-info-sign"></span></a>
                                    @endif
                                    @if($novedad['isNew'])
                                    <a class="btn btn-secondary btn-sm" href="{{ route('editar-evento', $novedad['id']) }}" role="button" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                                    @else
                                    <a class="btn btn-secondary btn-sm" href="{{ route('editar-efemeride', $novedad['id']) }}" role="button" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                                    @endif
                                    {{ Form::open(['route' => ['eliminar-novedad', $novedad['id']], 'method' => 'delete']) }}
                                    <button type="submit" class="btn btn-secondary btn-sm">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>    
                                    {{ Form::close() }}
                                </div>
                            </td>                            
                            @else
                            <td>{{ substr($novedad['date_at'], 8, 2) }}/{{ substr($novedad['date_at'], 5, 2) }}/{{ substr($novedad['date_at'], 0, 4) }}</td>
                            @if($novedad['isNew'])<td>Evento</td>@else<td>Efeméride</td>@endif
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
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
