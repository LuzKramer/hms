@extends('master')
@section('content')
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>

    <h1>informações do paciente </h1>
    <h3>voltar ao pacientes</h3> <a href="{{ route('patients.index') }}">clique aqui</a>

    <ul>
        <li>{{ $patient->img }}</li>
        <li>{{ $patient->name }}</li>
        <li>{{ $patient->urgency }}</li>
        <li>{{ $patient->cpf }}</li>
        <li>{{ $patient->codsus }}</li>
        <li>{{ $patient->email }}</li>
        <li>{{ $patient->fone }}</li>
        <li>{{ $patient->needcare }}</li>
        <li>{{ $patient->blood }}</li>
        <li>{{ $patient->sex }}</li>
        <li>{{ $patient->age }}</li>
        <li>{{ $patient->height }}</li>
        <li>{{ $patient->weight }}</li>
        <li> imc = {{ $imc }} kg/m2</li>
        <li>{{ $patient->symptoms }}</li>
        <li>{{ $patient->observations }}</li>
        <li>{{ $patient->medical_history }}</li>
        <li>{{ $patient->systolic_pressure }}</li>
        <li>{{ $patient->diastolic_pressure }}</li>
        <li>{{ $patient->temperature }}</li>
        <li>{{ $patient->heart_rate }}</li>
        <p>{{ $patient->ai_resp }}</p>




    </ul>
    <button><a href="{{ route('patients.edit', ['patient' => $patient->patient]) }}">editar</a></button>
    <button><a href="{{route('diagnostic.create', ['patient' => $patient->patient])}}">fazer um diagnostico</a></button>
@endsection
