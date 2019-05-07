<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Resetea tu clave</title>
</head>
<body>
    <p>Hola! Solicitaste el reseteo de tu contraseña.</p>
    <ul>
        <li>Nombre de usuario: {{ $data->user }}</li>
        <li>Nueva contaseña: {{ $data->pass }}</li>
    </ul>
    <p>Por favor inicia nuevamente sesión en la aplicación y cambia la contraseña para tener mayor seguridad. La misma solo tiene una validez de 24 horas.</p>
    <br>
    <br>
    <p>Muchas Gracias!</p>

    <br>
    <p>Mujeres Libres SFC</p>
</body>
</html>