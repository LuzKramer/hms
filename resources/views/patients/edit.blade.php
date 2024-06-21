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
        <input type="tel" name="fone" id="fone" value="{{ $patient->fone }}"
            pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" placeholder="99-99999-9999">
        <script>
            document.getElementById('fone').addEventListener('input', function(e) {
                var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
                e.target.value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
            });
        </script>




        <label for="cpf">CPF:</label>
        <input type="tel" name="cpf" id="cpf" value="{{ $patient->cpf }}"
            pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" maxlength="14" placeholder="123.456.789-01">

        <script>
            document.getElementById('cpf').addEventListener('input', function(e) {
                var cpf = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
                cpf = cpf.slice(0, 11); // Limit the CPF to 11 digits
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Insert a dot after the third digit
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Insert a dot after the sixth digit
                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Insert a hyphen after the ninth digit
                e.target.value = cpf;
            });
        </script>

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
        <textarea name="symptoms" id="" cols="30" rows="10">{{ $patient->symptoms }}</textarea>

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

        <label for="room">Sala</label>
        <select name="room" id="room">
            @foreach ($rooms as $room )
            <option value="{{$room->room}}">{{$room->name}}</option>

            @endforeach
        </select>

        <input type="submit" value="add">


    </form>
@endsection
