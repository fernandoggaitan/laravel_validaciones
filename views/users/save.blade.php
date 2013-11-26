<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Guardar usuario </title>
    </head>
    <body>
        <h1> Guardar usuario </h1>
        @if(isset($errors))
        <ul>
            @foreach($errors as $item)
            <li> {{ $item }} </li>
            @endforeach
        </ul>
        @endif
        {{ Form::open(array('url' => 'users/' . $user->id)) }}
            {{ Form::label ('real_name', 'Nombre real') }}
            <br />
            {{ Form::text ('real_name', $user->real_name) }}
            <br />
            {{ Form::label ('email', 'Email') }}
            <br />
            {{ Form::text ('email', $user->email) }}            
            <br />            
            @if($user->id)
                {{ Form::hidden ('_method', 'PUT') }}
            @else
                {{ Form::label ('password', 'Contraseña') }}
                <br />
                {{ Form::password ('password') }}
                <br />
            @endif
            {{ Form::label ('level', 'Nivel') }}
            <br />
            {{ Form::selectRange('level', 1, 5, array('selected' => $user->level) ) }}
            <br />
            {{ Form::submit('Guardar usuario') }}
            {{ link_to('users', 'Cancelar') }}
        {{ Form::close() }}
    </body>
</html>