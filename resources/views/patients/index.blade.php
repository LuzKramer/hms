@extends('master')
@section('content')
    <a href="{{route('patients.create')}}">Cadastrar paciente</a>

    <div>
        <h1>Patients</h1>
        <ul>
            @foreach ($patients as $patient)
                <li>
                    {{ $patient->img}}, {{ $patient->name }}, {{ $patient->cpf }}
                    <button><a href="{{ route('patients.show', ['patient' => $patient->patient]) }}">mais
                            informações</a></button>

                </li>
            @endforeach

        </ul>
    </div>
@endsection
