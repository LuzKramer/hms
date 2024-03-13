@extends('master')
@section('content')
    <h1>nova profissão</h1>
    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif
    <form action="{{ route('specializ.store') }}" method="post">
        @csrf

        <label for="descript">especialização</label>
        <input type="text" name="name" placeholder="Nome da profissão">
        <label for="descript">Descrição:</label>
        <textarea name="descript" id="descript" cols="30" rows="10"></textarea>
        <input type="submit" value="adicionar">
    </form>
@endsection
