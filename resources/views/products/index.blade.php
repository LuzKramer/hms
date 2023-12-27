@extends('master')
@section('content')
    @foreach ($products as $product)
       <ul>
        <li><a href="{{route('product.show', ['product'=>$product->product])}}">{{$product->name}}</a></li>
       </ul>
    @endforeach
@endsection
