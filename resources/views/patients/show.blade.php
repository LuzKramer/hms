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
        <li>{{ $patient->symptoms }}</li>
        <li>{{ $patient->observations }}</li>
        <li>{{$patient->medical_history}}</li>
        <li>{{ $patient->systolic_pressure }}</li>
        <li>{{ $patient->diastolic_pressure }}</li>
        <li>{{ $patient->temperature }}</li>
        <li>{{ $patient->heart_rate }}</li>
        <p>{{$patient->ai_resp}}</p>



    </ul>
    <button><a href="{{ route('patients.edit', ['patient' => $patient->patient]) }}">editar</a></button>
@endsection
