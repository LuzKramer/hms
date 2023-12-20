@extends('master')
@section('content')
    <h1>Deletar</h1>
    <h3>Profissão : {{ $specializa->name }}</h3>

    <form action="{{ route('specializ.destroy', ['specializ' => $specializa->specialization]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Deletar">
    </form>
@endsection
