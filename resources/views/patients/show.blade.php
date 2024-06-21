@extends('master')
@section('content')
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>

    <h1>informações do paciente </h1>
    <h3>voltar ao pacientes</h3> <a href="{{ route('patients.index') }}">clique aqui</a>

    <h2>sala do paciente</h2>
    @if ($room)
        <p>{{ $room->name }}  <a href="{{ route('rooms.show', ['room' => $room->room]) }}">mais infornaçoes</a></p>
    @else
        <p>o paciente na tem sala !</p>
    @endif


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

    <h2>Diagnosticos do paciente</h2>

    @if (count($diagnostics) > 0)
        @foreach ($diagnostics as $diagnostic)
            <div border="1px solid black">
                <ul>
                    <li>{{ $diagnostic->date }}</li>
                    <li>{{ $diagnostic->descript }}</li>
                    <li>{{ $diagnostic->desiase }}</li>
                </ul>
            </div>
        @endforeach
    @else
        <p>nenhum diagnostico encontrado</p>
    @endif


    <button><a href="{{ route('patients.edit', ['patient' => $patient->patient]) }}">editar</a></button>
    <button><a href="{{ route('diagnostic.create', ['patient' => $patient->patient]) }}">fazer um diagnostico</a></button>

@endsection
