@extends('master')
@section('content')
    <a href="{{route('patients.create')}}">Cadastrar paciente</a>

    <div>
        <h1>Patients</h1>
        <ul>
            @foreach ($patients as $patient)
                <li>
                    {{ $patient->name }}, {{ $patient->cpf }}, {{ $patient->img }}
                    <button><a href="{{ route('patients.show', ['patient' => $patient->patient]) }}">mais
                            informações</a></button>
                    <button><a href="{{ route('patients.edit', ['patient' => $patient->patient]) }}">editar</a></button>
                </li>
            @endforeach

        </ul>
    </div>
@endsection
