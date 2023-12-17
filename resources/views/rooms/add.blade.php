<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sala</title>
</head>

<body>
    <form action="{{route('room.add'}}" method="POST">
        @csrf
        @method('post')
        <h2>Editar</h2>
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">

        <label for="floor">Andar:</label>
        <input type="number" name="floor"  id="floor">

        <label for="block">Bloco:</label>
        <select name="block" id="block">
            <!-- Add options dynamically based on your data -->
            @foreach ($room_types as $room_type)
                <option value="{{ $room_type->name}}" {{ $room_type->name == $room->room_type ? 'selected' : '' }}>
                    {{ $room_type->name }}
                </option>
            @endforeach
        </select>
        <label for="block">Bloco:</label>
        <select name="block" id="block">
            <!-- Add options dynamically based on your data -->
            @foreach ($blocks as $block)
                <option value="{{ $block->block }}" {{ $block->block == $room->block ? 'selected' : '' }}>
                    {{ $block->name }}
                </option>
            @endforeach
        </select>

        <label for="descript">Descrição:</label>
        <textarea name="descript" id="descript" cols="30" rows="10"></textarea>

        <label for="occupied">Ocupado:</label>
        <select name="occupied" id="occupied">
            <option value="1" {{ $room->occupied ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ !$room->occupied ? 'selected' : '' }}>Não</option>
        </select>

        <button type="submit">Salvar</button>
    </form>
</body>

</html>
