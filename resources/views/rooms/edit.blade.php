@extends('master')

@section('content')
    {{ $room->name }}
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <h2>Editar</h2>

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $room->name }}">

        <label for="floor">Andar:</label>
        <input type="number" name="floor" id="floor" value="{{ $room->floor }}">

        <label for="room_type_id">Tipo de Sala:</label>
        <select name="room_type_id" id="room_type_id">
            <!-- Adicione opções dinamicamente com base nos seus dados -->
            @foreach ($room_types as $room_type)
                <option value="{{ $room_type->name}}"
                    {{ $room_type->room_type_id == $room->room_type_id ? 'selected' : '' }}>
                    {{ $room_type->name }}
                </option>
            @endforeach
        </select>

        <label for="block_id">Bloco:</label>
        <select name="block_id" id="block_id">
            <!-- Adicione opções dinamicamente com base nos seus dados -->
            @foreach ($blocks as $block)
                <option value="{{ $block->name }}" {{ $block->block_id == $room->block_id ? 'selected' : '' }}>
                    {{ $block->name }}
                </option>
            @endforeach
        </select>

        <label for="descript">Descrição:</label>
        <textarea name="descript" id="descript" cols="30" rows="10">{{ $room->descript }}</textarea>

        <label for="occupied">Ocupado:</label>
        <select name="occupied" id="occupied">
            <option value="1" {{ $room->occupied ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ !$room->occupied ? 'selected' : '' }}>Não</option>
        </select>

        <button type="submit">Salvar</button>
    </form>
@endsection
