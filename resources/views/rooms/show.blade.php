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
            <li>{{ $patient->name }} <a href="{{ route('patients.show', ['patient' => $patient->patient]) }}">+infos</a></li>
        @endforeach
    @endif
@endsection
