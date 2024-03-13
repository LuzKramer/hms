@extends('master')
@section('content')

    <h1>informações do paciente </h1>

    <ul>
        <li>{{ $patient->img }}</li>
        <li>{{ $patient->name }}</li>
        <li>{{ $patient->urgency }}</li>
        <li>{{ $patient->cpf }}</li>
        <li>{{ $patient->codsus }}</li>
        <li>{{ $patient->email }}</li>
        <li>{{ $patient->fone }}</li>
        <li>{{ $patient->allergies }}</li>
        <li>{{ $patient->prediseases }}</li>

    </ul>
    <button><a href="{{ route('patients.edit', ['patient' => $patient->patient]) }}">editar</a></button>
@endsection
