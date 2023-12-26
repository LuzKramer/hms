@extends('master')
@section('content')
    @foreach ($products as $product)
       <ul>
        <li><a href="{{route('pharma.produ', ['product'=>$product->product])}}">{{$product->name}}</a></li>
       </ul>
    @endforeach
@endsection
