<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <main role="main">
            <div class="col-12 mujeres-libres">
                <h1 class="titulo-seccion bs-docs-featurette-title"> Noticias </h1>
                <p class="slogan">Noticias a nivel local, provincial, nacional e internacional.</p>
            </div>
            <br>
            <div class="col-12">
                <div class="row">
                    @if (Auth::check())
                    <div class="col-10">
                        <input class="form-control" id="filtarNoticias" type="text" placeholder="Ingrese una fecha o una descripción">
                    </div>
                    <div class="col-2">
                        <a class="btn btn-secondary" href="{{ route('agregar-noticia') }}" role="button">Agregar noticia</a>
                    </div>
                    @else
                    <div class="col-12">
                        <input class="form-control" id="filtarNoticias" type="text" placeholder="Ingrese una fecha o una descripción">
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
                            <th scope="col">Título</th>
                            <th scope="col">Opciones</th>
                            @else
                            <th scope="col">Día</th>
                            <th scope="col">Título</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="noticias">
                        @foreach($noticias as $k => $noticia)
                        <tr>
                            @if (Auth::check())
                            <td class="d-none d-print-block">{{ $noticia['id'] }}</td>
                            <td>{{ substr($noticia['date_at'], 8, 2) }}/{{ substr($noticia['date_at'], 5, 2) }}/{{ substr($noticia['date_at'], 0, 4) }}</td>
                            <td>{{ $noticia['title'] }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm" href="{{ route('ver-noticia', $noticia['id']) }}" role="button" title="Ver"><span class="glyphicon glyphicon-info-sign"></span></a>
                                <a class="btn btn-secondary btn-sm" href="{{ route('editar-noticia', $noticia['id']) }}" role="button" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                                {{ Form::open(['route' => ['eliminar-noticia', $noticia['id']], 'method' => 'delete']) }}
                                <button type="submit" class="btn btn-secondary btn-sm">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>    
                                {{ Form::close() }}
                            </td>                            
                            @else
                            <td>{{ substr($noticia['date_at'], 8, 2) }}/{{ substr($noticia['date_at'], 5, 2) }}/{{ substr($noticia['date_at'], 0, 4) }}</td>
                            <td>{{ $noticia['title'] }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
                {{$noticias->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </main>   
</body>
</html>
@section('page-js-script')
<script type="text/javascript">
    $(document).ready(function () {
        $("#filtarNoticias").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#noticias tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
