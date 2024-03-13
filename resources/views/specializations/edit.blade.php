@extends('master')
@section('content')
    <h1>editar</h1>
    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif
    <form action="{{ route('specializ.update', ['specializ' => $specializa->specialization]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="descript">Trabalho</label>
        <input type="text" name="name" value="{{ $specializa->name }}">
        <label for="descript">Descrição:</label>
        <textarea name="descript" id="descript" cols="30" rows="10">{{ $specializa->descript }}</textarea>
        <input type="submit" value="atualizar">
    </form>
@endsection
