<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <h1> salas</h1>
        <ul>
            @foreach ($rooms as $room)
                <li>{{ $room->room }},{{ $room->name }},{{ $room->descript }} | <a
                        href="{{ route('rooms.edit', ['room' => $room->room]) }}">editar</a> <a href="">excluir</a>
                </li>
            @endforeach
        </ul>

    </div>
</body>

</html>
