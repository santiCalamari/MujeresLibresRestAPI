<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('inicio') }}">Mujeres Libres</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            @if (Auth::check())
            <li class="nav-item active">
                <a class="nav-link" href="#">Mi perfil<span class="sr-only">(current) </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cerrar-sesion') }}">Salir</a>
            </li>      
            @else
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('iniciar-sesion') }}">Iniciar Sesión <span class="sr-only">(current) </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Registrarse</a>
            </li>      
            @endif

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>