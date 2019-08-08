<!doctype html>
<html lang="en">
    @include('web.partials.head') 
    <body>
        @include('web.partials.nav') 
        <main role="main">
            <div class="jumbotron panel-mujeres-libres">
                <div class="container">
                    <p class="display-3 text-center mujeres-libres"> MUJERES LIBRES </p>
                    <p class="text-center slogan">Tu fuerza es tu libertad. Aplicación web contra las violencias de género.</p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Centros de Ayuda</h2>
                        <p> Las personas que recorren la ruta de la denuncia, pueden registrar las instituciones a las que han acuddo y calificar la atención recibida en las mismas.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Ver más &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Test</h2>
                        <p> Permite realizar encuestas sobre cuestiones de género. </p>
                        <p><a class="btn btn-secondary" href="#" role="button">Ver más &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Asesorate</h2>
                        <p>Permite contactarse con el 144, 911 y el 0800 777 5000 y otros organismos especializados.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Ver más &raquo;</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h2>Informate</h2>
                        <p> Permite encontrar información sobre: Violencias de Género, Derechos y Recursos existentes, Educación Sexual Integral, a traves de contenidos interactivos y amigables.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Ver más &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Novedades</h2>
                        <p> Permite compartir eventos a nivel local. Además brinda información sobre efemérides feministas.</p>
                        <p><a class="btn btn-secondary" href="{{ route('listado-novedades') }}" role="button">Ver más &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Encontrarte</h2>
                        <p> Permite sumarse al voluntariado Municipal sobre trata de personas y violencias de género.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Ver más &raquo;</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2>Noticias</h2>
                        <p>Permite compartir noticias a nivel local, provincial, nacional e internacional. </p>
                        <p><a class="btn btn-secondary" href="{{ route('listado-noticias') }}" role="button">Ver más &raquo;</a></p>
                    </div>
                    <div class="col-md-6">
                        <h2>Consultas</h2>
                        <p> Permite enviar consultas hacia el Área Mujer y Diversidad Sexual.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Ver más &raquo;</a></p>
                    </div>
                </div>

                <hr>

            </div> <!-- /container -->

        </main>
    </body>
    <footer class="container">
        <p>&copy; Municipalidad de Santa Fe - Universidad Nacional del Litoral</p>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>

