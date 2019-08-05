<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <main role="main">
            <div class="col-12">
                <div class="jumbotron panel-mujeres-libres">
                    <div class="container">
                        <p class="display-4 text-center mujeres-libres"> Novedades - Eventos y efemerides </p>
                    </div>
                </div>
                <table id="novedades" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>Titulo</th>
                            <th>Opciones</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($novedades as $k => $novedad)
                        <tr>
                            <td>{{ $novedad[$k]->date_at }}</td>
                            <td>{{ $novedad[$k]->title }}</td>
                            <td>Editar - Eliminar</td>                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>                
                <!--{{ $novedades->links() }}-->
            </div>
        </main>
    </body>
</html>
