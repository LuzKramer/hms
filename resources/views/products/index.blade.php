@extends('master')
@section('content')
    @foreach ($products as $product)

    //if pelo nivel pra aparecer btn de adm.
        <ul>
            <li><a href="{{ route('product.show', ['product' => $product->product]) }}">{{ $product->name }}
            </a></li>
        </ul>
    @endforeach
@endsection
