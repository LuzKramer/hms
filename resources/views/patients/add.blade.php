@extends('master')
@section('content')
    <h1>edit paciente </h1>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email">

        <label for="fone">Telefone:</label>
        <input type="text" name="fone" id="fone">

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf">

        <label for="codsus">Cadastro SUS:</label>
        <input type="text" name="codsus" id="codsus">

        <label for="cares">Recebe cuidados:</label>
        <select name="cares" id="cares">
            <option value="true">Sim</option>
            <option value="false">Não</option>
        </select>

        <label for="blood">Sangue</label>
        <select name="blood" id="blood">
            @foreach ($bloods as $blood)
                <option value="{{ $blood->blood }}">{{ $blood->name }}</option>
            @endforeach
        </select>

        <label for="prediseases">Pré-existentes:</label>
        <textarea name="prediseases" id="prediseases" cols="30" rows="10"></textarea>

        <label for="allergies">Alergias:</label>
        <textarea name="allergies" id="allergies" cols="30" rows="10"></textarea>

        <label for="urgency">Urgência:</label>
        <select name="urgency" id="urgency">
            <option value="1">Baixa</option>
            <option value="2">Moderada</option>
            <option value="3">Alta</option>
            <option value="4">Muito alta</option>
            <option value="5">Extrema</option>
        </select>

        <input type="submit" value="add">


    </form>
@endsection
