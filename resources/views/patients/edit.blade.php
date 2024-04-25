@extends('master')
@section('content')
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>
    <h1>edit paciente </h1>
    <form action="{{ route('patients.update', ['patient' => $patient->patient]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $patient->name }}">

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="{{ $patient->email }}">

        <label for="fone">Telefone:</label>
        <input type="text" name="fone" id="fone" value="{{ $patient->fone }}">

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="{{ $patient->cpf }}">

        <label for="codsus">Cadastro SUS:</label>
        <input type="text" name="codsus" id="codsus" value="{{ $patient->codsus }}">


        <label for="sex">sexo</label>
        <select name="sex" id="sex">

            <option value="m">Masculino</option>
            <option value="f">Feminino</option>
        </select>
        <label for="born">Nascimento:</label>
        <input type="date" name="born" id="born" value="{{ $patient->born }}">

        <label for="weight">Peso:</label>
        <input type="number" name="weight" id="weight" value="{{ $patient->weight }}">

        <label for="height">Altura:</label>
        <input type="number" name="height" id="height" value="{{ $patient->height }}">


        <label for="needcare">Recebe cuidados:</label>
        <select name="needcare" id="needcare">
            <option value="true">Sim</option>
            <option value="false">Não</option>
        </select>

        <label for="blood">Sangue</label>
        <select name="blood" id="blood">
            @foreach ($bloods as $blood)
                <option value="{{ $blood->blood }}">{{ $blood->name }}</option>
            @endforeach
        </select>

        <label for="symptoms">Sintomas:</label>
        <textarea name="symptoms" id="" cols="30" rows="10">{{$patient->symptoms}}</textarea>

        <label for="medical_history">Histórico Médico:</label>
        <textarea name="medical_history" id="medical_history" cols="30" rows="10">{{ $patient->medical_history }}</textarea>

        <label for="observations">Observações:</label>
        <textarea name="observations" id="observations" cols="30" rows="10">{{ $patient->observations }}</textarea>

        <label for="systolic_pressure">Pressão Sistolica:</label>
        <input type="text" name="systolic_pressure" id="systolic_pressure" value="{{ $patient->systolic_pressure }}">

        <label for="diastolic_pressure">Pressão Diastolica:</label>
        <input type="text" name="diastolic_pressure" id="diastolic_pressure" value="{{ $patient->diastolic_pressure }}">

        <label for="temperature">Temperatura:</label>
        <input type="text" name="temperature" id="temperature" value="{{ $patient->temperature }}">

        <label for="heart_rate">Frequecia Cardiaca:</label>
        <input type="text" name="heart_rate" id="heart_rate" value="{{ $patient->heart_rate }}">




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
