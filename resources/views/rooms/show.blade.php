@extends('master')
@section('content')
    <h1>informações da sala </h1>

    <ul>
        <li>{{$room->name}}</li>
        <li>{{$room->descript}}</li>
        <li>{{$room->block}}</li>
        <li>{{$room->floor}}</li>
        @php $txt = $room->occupied ? "ocupado" : "livre"; @endphp
        <li>{{$txt}}</li>
@endsection
