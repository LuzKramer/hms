@extends('master')
@section('content')
    <div>

        <div>
            @if (Auth::user()->level == 3)
                <h2><a href="{{ route('medic.board') }}">painel do médico</a></h2>
            @elseif (Auth::user()->level == 4)
                <h2><a href="{{ route('nurse.board') }}">painel do emfermeiro</a></h2>
            @elseif (Auth::user()->level == 2)
                <h2><a href="{{ route('register') }}">registrar usuario/funcionario</a></h2>
            @elseif (Auth::user()->level == 1)
                <h2><a href="{{ route('medic.board') }}">painel do médico</a></h2>
                <h2><a href="{{ route('nurse.board') }}">painel do emfermeiro</a></h2>
                <h2><a href="{{ route('register') }}">registrar usuario/funcionario</a></h2>
            @endif








        </div>
    @endsection
