@extends('master')
@section('content')
    <h1>Prescrição para o paciente</h1>
    <button onclick="window.location.href='{{ route('patients.show', ['patient' => $patient->patient]) }}'">voltar</button>


    medico resp: {{ $prescription->name }}

    <br>

    leito : {{ $patient->room }}

    <ul>
        <li>{{ $patient->name }}</li>
        <li>{{ $patient->born }}</li>
        <li>{{ $patient->cpf }}</li>
        <li>{{ $patient->height }}</li>
        <li>{{ $patient->weight }}</li>
        <li>{{ $patient->sex }}</li>


    </ul>

    <ul>
        <li>{{ $prescription->datetime }}</li>
        <li>{{ $prescription->descript }}</li>

    </ul>
    @if (Auth::check() && in_array(Auth::user()->level, [3, 1]))
        <button
            onclick="window.location.href='{{ route('prescription.edit', ['prescription' => $prescription->medication]) }}'">editar</button>
    @else
    @endif
@endsection
