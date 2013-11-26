<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Datos de usuario </title>
    </head>
    <body>
        <h1> {{ $user->real_name }} </h1>
        <ul>
            <li> Nombre de usuario: {{ $user->real_name }} </li>
            <li> Email: {{ $user->email }} </li>
            <li> Nivel: {{ $user->level }} </li>
            <li> Activo: {{ ($user->active) ? 'Sí' : 'No' }} </li>
        </ul>
        <p> {{ link_to('users', 'Volver atrás') }} </p>
    </body>
</html>