@extends('master')
@section('content')
<div>
    @if (Auth::user()->level == 3 || 1)
    <h2><a href="{{ route('medic.board') }}">painel do médico</a></h2>

    @elseif (Auth::user()->level == 4 || 3 || 1)
    <h2><a href="{{ route('') }}">painel do emfermeiro</a></h2>


    @endif
        <div>
            @if (Auth::user()->level == 3)
            <h2><a href="{{ route('medic.board') }}">painel do médico</a></h2>

            @elseif (Auth::user()->level == 4)
            <h2><a href="{{ route('nurse.board') }}">painel do emfermeiro</a></h2>








</div>
@endsection