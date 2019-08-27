<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <title>Asunto: {{ $obj->subject }} </title>
    </head>
    <body>
        <p>Hola! El usuario {{ $obj->name }}, cuya forma de contacto es {{ $obj->forma_contacto }} ha enviado la siguiente consulta</p>
        <br>
        <p>{{ $obj->descrption }}</p>
        <br>

        <p>Mujeres Libres SFC</p>
    </body>
</html>