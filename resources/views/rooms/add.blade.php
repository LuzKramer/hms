<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sala</title>
</head>

<body>
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf

        <h2>Editar</h2>
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">

        <label for="floor">Andar:</label>
        <input type="number" name="floor" id="floor">

        <label for="room_type">tipo:</label>
        <select name="room_type" id="room_type">
            <!-- Add options dynamically based on your data -->
            @foreach ($room_types as $room_type)
                <option value="{{ $room_type->room_type }}">
                    {{ $room_type->name }}
                </option>
                </option>
            @endforeach
        </select>

        <label for="block">Bloco:</label>
        <select name="block" id="block">
            <!-- Add options dynamically based on your data -->
            @foreach ($blocks as $block)
                <option value="{{ $block->block }}">
                    {{ $block->name }}
                </option>
            @endforeach
        </select>

        <label for="descript">Descrição:</label>
        <textarea name="descript" id="descript" cols="30" rows="10"></textarea>



        <button type="submit">Salvar</button>
    </form>
</body>

</html>
