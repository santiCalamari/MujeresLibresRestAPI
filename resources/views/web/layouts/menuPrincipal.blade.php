<!doctype html
    <html lang="{{ app()->getLocale() }}">
<head>
    @include('web.partials.head')
</head>
<body>
    @include('web.partials.nav')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md titulo">
                <button href="{{ route('menu-principal') }}" type="button" class="btn btn-default">MUJERES LIBRES</button>
            </div>
            <h1 class="subtitulo">Tu fuerza es tu libertad</h1>
        </div>
    </div>
</body>
@include('web.partials.footer')
@include('web.partials.footer-scripts')
</html>
