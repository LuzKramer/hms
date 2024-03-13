@extends('master')
@section('content')
<h1>editar</h1>
@if (session()->has('message'))
    {{session()->get('message')}}

@endif
<form action="{{route('blocks.update', ['block'=>$block->block])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <label for="descript">bloco</label>
    <input type="text" name="name"  value="{{$block->name}}">

    <input type="submit" value="atualizar">
</form>

@endsection
