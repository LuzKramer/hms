@extends('master')
@section('content')
    <a href="{{ route('specializ.create') }}">adicionar especialização</a>

    <hr>
    <div>
        <h1>Trabalhos</h1>
        <ul>
            @foreach ($specializ as $specializa)
                <li>{{ $specializa->specialization }},{{ $specializa->name }},{{ $specializa->descript }} | <a
                        href="{{ route('specializ.edit', ['specializ' => $specializa->specialization]) }}">editar</a> <a
                        href="{{ route('specializ.show', ['specializ' => $specializa->specialization]) }}">excluir</a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
