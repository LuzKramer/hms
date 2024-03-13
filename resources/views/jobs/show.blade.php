@extends('master')
@section('content')
<h1>Deletar</h1>
<h3>Profissão : {{$job->name}}</h3>

<form action="{{route('jobs.destroy', ['job'=>$job->job])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="Deletar">
</form>

@endsection
