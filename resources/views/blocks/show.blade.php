@extends('master')
@section('content')
    <h1>Deletar</h1>
    <h3>bloco: {{ $block->name }}</h3>

    <form action="{{ route('blocks.destroy', ['block' => $block->block]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Deletar">
    </form>
@endsection
