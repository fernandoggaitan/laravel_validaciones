<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Usuarios </title>
    </head>
    <body>
        <h1> Usuarios </h1>
        @if(Session::has('notice'))
        <p> <strong> {{ Session::get('notice') }} </strong> </p>
        @endif
        <p> {{ link_to ('users/create', 'Crear nuevo usuario') }} </p>
        @if($users->count())
        <table style="border: solid 1px #000;">
            <thead>
                <tr>
                    <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre real </th>
                    <th style="width: 200px; border-bottom: solid 1px #000;"> Email </th>
                    <th style="width: 50px; border-bottom: solid 1px #000;"> Nivel </th>
                    <th style="width: 50px; border-bottom: solid 1px #000;"> Estado </th>
                    <th style="width: 50px; border-bottom: solid 1px #000;">  </th>
                    <th style="width: 50px; border-bottom: solid 1px #000;">  </th>
                    <th style="width: 50px; border-bottom: solid 1px #000;">  </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td style="text-align: center;"> {{ $item->real_name }} </td>
                    <td style="text-align: center;"> {{ $item->email }} </td>
                    <td style="text-align: center;"> {{ $item->level }} </td>
                    <td style="text-align: center;"> {{ ($item->active) ? 'Sí' : 'No' }} </td>
                    <td style="text-align: center;"> {{ link_to('users/'.$item->id, 'Ver') }} </td>
                    <td style="text-align: center;"> {{ link_to('users/'.$item->id.'/edit', 'Editar') }} </td>
                    <td style="text-align: center;">  
                        {{ Form::open(array('url' => 'users/'.$item->id)) }}
                        {{ Form::hidden("_method", "DELETE") }}
                        {{ Form::submit("Eliminar") }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p> No se han encontrado usuarios </p>
        @endif
    </body>
</html>