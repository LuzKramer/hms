@extends('master')
@section('content')
    <a href="{{ route('blocks.create') }}">adicionar bloco</a>

    <hr>
    <div>
        <h1>blocos</h1>
        <ul>
            @foreach ($blocks as $block)
                <li>{{ $block->block }},{{ $block->name }}| <a
                        href="{{ route('blocks.edit', ['block' => $block->block]) }}">editar</a> <a
                        href="{{ route('blocks.show', ['block' => $block->block]) }}">excluir</a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
