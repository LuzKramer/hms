@extends('master')
@section('content')
    @foreach ($categories as $category)
       <ul>
        <li><a href="{{route('pharma.index_prod',['category'=>$category->name])}}">{{$category->name}}</a></li>
       </ul>
    @endforeach
@endsection
