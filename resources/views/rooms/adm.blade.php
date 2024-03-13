@extends('master')

@section('content')
    <a href="{{ route('rooms.create') }}">Add new room</a>

    <div>
        <h1>Rooms</h1>
        <ul>
            @foreach ($rooms as $room)
                <li>{{ $room->room }}, {{ $room->name }}, {{ $room->descript }} |
                    <button><a href="{{ route('rooms.edit', ['room' => $room->room]) }}">editar</a></button>
                    <form action="{{ route('rooms.destroy', ['room' => $room->room]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
