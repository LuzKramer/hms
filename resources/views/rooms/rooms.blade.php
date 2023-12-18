@extends('master')
@section('content')
    <div>
        <h1>salas</h1>
        <ul>
            @foreach ($rooms as $room)
                @php $txt = $room->occupied ? "ocupado" : "livre"; @endphp
                <li>{{ $room->name }}, {{ $room->descript }}, {{ $txt }}
                    <button><a href="{{ route('rooms.confirm', ['room' => $room->room]) }}">confirmar uso</a></button>
                    <button><a href="{{ route('rooms.show', ['room' => $room->room]) }}">informações da sala</a></button>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
