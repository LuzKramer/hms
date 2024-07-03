@extends('master')
@section('content')
<h1>Fazer medicação</h1>
@if (session()->has('message'))
    {{ session()->get('message') }}
@endif


<h1>infos do paciente </h1>
<li>{{ $patient->name }}</li>
<li>{{ $patient->cpf }}</li>
<li>{{ $patient->codsus }}</li>
<li>{{ $patient->height }}</li>
<li>{{ $patient->weight }}</li>


<form action="{{route('medication.store', ['patient' => $patient->patient])}}" method="post">
    @csrf
  <textarea name="descript" id="descript" cols="30" rows="10"></textarea>
    <input type="submit" value="adicionr">
@endsection
