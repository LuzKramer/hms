@extends('master')
@section('content')
<h1>Novo Diagnostico</h1>
<div>

    @if (session()->has('message'))
    {{session()->get('message')}}

    @endif
</div>

<form action="{{route('diagnostic.store', ['patient' => $patient->patient])}}" method="post">
    @csrf

    <label for="descript">Diagnostico</label>
    <br><br>
    <label for="patient">Paciente</label>
    <p>{{$patient->name}}</p>



    <br>
    <label for="descript">descrição</label>
    <input type="text" name="descript" placeholder="descrição do diagnostico">

    <label for="disease">Doença"</label>
    <select name="disease" >
        @foreach ($diseases as $disease )
            <option value="{{$disease->disease}}">{{$disease->name}}</option>

        @endforeach
    </select>


    <input type="submit" value="salvar">
</form>

@endsection
