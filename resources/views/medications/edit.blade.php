@extends('master')
@section('content')
    <h1>edit Medicamento</h1>
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>
    <form action="{{ route('prescription.update', ['prescription' => $prescription->medication]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <label for="descript">Descrição:</label>
        <textarea name="descript" id="descript" cols="30" rows="10">{{ $prescription->descript }}</textarea>
        <input type="submit" value="atualizar">
    </form>
@endsection
