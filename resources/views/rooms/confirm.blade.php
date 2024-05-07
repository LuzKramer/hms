@extends('master')
@section('content')
    <h1>informações da sala </h1>

    <ul>
        <li>{{ $room->name }}</li>
        <li>{{ $room->descript }}</li>
        <li>{{ $room->capacity }}</li>
        <li>{{ $room->block }}</li>
        <li>{{ $room->floor }}</li>
        @php $txt = $room->occupied ? "ocupado" : "livre"; @endphp
        <li>{{ $txt }}</li>
    </ul>
    <h2>pacientes na sala</h2>
    @if ($patients->count() == 0)
        <p>nenhum paciente na sala</p>
    @else
        @foreach ($patients as $patient)
            <li>{{ $patient->name }}</li>
        @endforeach
    @endif
    <h1>comfirme se a sala esta cheia </h1>
    <form action="{{ route('rooms.update', ['room' => $room->room]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <label for="occupied">Ocupado:</label>
        <select name="occupied" id="occupied">
            <option value="1" {{ $room->occupied ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ !$room->occupied ? 'selected' : '' }}>Não</option>
        </select>

        <button type="submit">Salvar</button>
    </form>
@endsection
