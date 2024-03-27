@extends('master')

@section('content')
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>
    <form action="{{ route('rooms.update', ['room' => $room->room]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <h2>Editar</h2>

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $room->name }}">

        <label for="floor">Andar:</label>
        <input type="number" name="floor" id="floor" value="{{ $room->floor }}">

        <label for="room_type">Tipo de Sala:</label>
        <select name="room_type" id="room_type">
            <!-- Adicione opções dinamicamente com base nos seus dados -->
            @foreach ($room_types as $room_type)
                <option value="{{ $room_type->room_type }}"
                    {{ $room_type->room_type== $room->room_type? 'selected' : '' }}>
                    {{ $room_type->name }}
                </option>
            @endforeach
        </select>

        <label for="block">Bloco:</label>
        <select name="block" id="block">
            <!-- Adicione opções dinamicamente com base nos seus dados -->
            @foreach ($blocks as $block)
                <option value="{{ $block->block }}" {{ $block->block== $room->block? 'selected' : '' }}>
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
b
