@extends('master')
@section('content')
    @foreach ($products as $product)
        <ul>
            <li><a href="{{ route('product.show', ['product' => $product->product]) }}">{{ $product->name }}</a>
                <button><a href="{{ route('product.edit', ['product' => $product->product]) }}">editar</a></button>
                <form action="{{ route('product.destroy', ['product' => $product->product]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Deletar</button>
                </form>
            </li>
        </ul>
    @endforeach
@endsection
