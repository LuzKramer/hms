@extends('master')

@section('content')
    <div>

        @if (session('message'))
            <p>{{ session('message') }}</p>
        @endif
    </div>
    <a href="{{ route('patients.create') }}">Cadastrar paciente</a>

    <div>
        <h3>pesquisa de paciente</h3>
        <form action="{{ route('patients.src') }}" method="POST">
            @csrf
            <input type="text" name="src">
            <input type="submit" value="pesquisar">
        </form>

    </div>

    <div>
        <h1>Patients</h1>
        <ul>
            @foreach ($patients as $patient)
                <li>
                    {{ $patient->img }}, {{ $patient->name }}, {{ $patient->cpf }}
                    <button><a href="{{ route('patients.show', ['patient' => $patient->patient]) }}">mais
                            informações</a></button>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
