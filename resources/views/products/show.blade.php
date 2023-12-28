@extends('master')

@section('content')
    <ul>
        <li>{{ $product->name ?? 'N/A' }}</li>
        <li>{{ $product->category_name ?? 'N/A' }}</li>
        <li>{{ $product->descript ?? 'N/A' }}</li>
        <li>{{ $product->exp_date ?? 'N/A' }}</li>
    </ul>




@endsection
