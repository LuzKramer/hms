@extends('master')
@section('content')
    <a href="{{ route('jobs.create') }}">adicionar trabalho</a>

    <hr>
    <div>
        <h1>Trabalhos</h1>
        <ul>
            @foreach ($jobs as $job)
                <li>{{ $job->job }},{{ $job->name }},{{ $job->descript }} | <a
                        href="{{ route('jobs.edit', ['job' => $job->job]) }}">editar</a> <a href="{{route('jobs.show', ['job'=>$job->job])}}">excluir</a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
