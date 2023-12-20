@extends('master')
@section('content')
<h1>nova profissão</h1>
@if (session()->has('message'))
    {{session()->get('message')}}

@endif
<form action="{{route('blocks.store')}}" method="post">
    @csrf

    <label for="descript">bloco</label>
    <input type="text" name="name" placeholder="Nome da profissão">
    <input type="submit" value="adicionar">
</form>

@endsection
