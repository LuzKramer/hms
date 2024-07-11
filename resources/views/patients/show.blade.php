@extends('master')
@section('content')
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>

    <h1>informações do paciente </h1>
    <h3>voltar ao pacientes</h3> <a href="{{ route('patients.index') }}">clique aqui</a>

    <h2>sala do paciente</h2>
    @if ($room)
        <p>{{ $room->name }} <a href="{{ route('rooms.show', ['room' => $room->room]) }}">mais infornaçoes</a></p>
    @else
        <p>o paciente na tem sala !</p>
    @endif


    <ul>
        <li>{{ $patient->img }}</li>
        <li>{{ $patient->name }}</li>
        <li>{{ $patient->urgency }}</li>
        <li>{{ $patient->cpf }}</li>
        <li>{{ $patient->codsus }}</li>
        <li>{{ $patient->email }}</li>
        <li>{{ $patient->fone }}</li>
        <li>{{ $patient->needcare }}</li>
        <li>{{ $patient->blood }}</li>
        <li>{{ $patient->sex }}</li>
        <li>{{ $patient->age }}</li>
        <li>{{ $patient->height }}</li>
        <li>{{ $patient->weight }}</li>
        <li> imc = {{ $imc }} kg/m2</li>
        <li>{{ $patient->symptoms }}</li>
        <li>{{ $patient->observations }}</li>
        <li>{{ $patient->medical_history }}</li>
        <li>{{ $patient->systolic_pressure }}</li>
        <li>{{ $patient->diastolic_pressure }}</li>
        <li>{{ $patient->temperature }}</li>
        <li>{{ $patient->heart_rate }}</li>
        <p>{{ $patient->ai_resp }}</p>

    </ul>

    @if (Auth::check() && in_array(Auth::user()->level, [4, 3, 1]))
        <button><a href="{{ route('patients.edit', ['patient' => $patient->patient]) }}">editar f </a></button>
    @endif


    <h2>Diagnosticos do paciente</h2>

    @if (count($diagnostics) > 0)
        @foreach ($diagnostics as $diagnostic)
            <div border="1px solid black">
                <ul>
                    <li>{{ $diagnostic->date }}</li>
                    <li>{{ $diagnostic->descript }}</li>
                    <li>{{ $diagnostic->desiase }}</li>
                </ul>
            </div>
        @endforeach
    @else
        <p>nenhum diagnostico encontrado</p>
    @endif

    <h2>Prescrições do paciente</h2>

    @if (count($prescriptions) > 0)
        @foreach ($prescriptions as $prescription)
            <div style="border: 1px solid black; padding: 10px; margin-bottom: 10px;">
                <ul>
                    <li> data da prescrição : {{ $prescription->datetime }}</li>
                    <li> medico responsavel :{{ $prescription->name }}</li>
                    <li>Medicação: {{ $prescription->descript }}</li>
                </ul>
                <button
                    onclick="window.location.href='{{ route('prescription.show', ['prescription' => $prescription->medication]) }}'">olhar
                    precrição </button>

                @if (Auth::check() && in_array(Auth::user()->level, [3, 1]))
                    <button
                        onclick="window.location.href='{{ route('prescription.edit', ['prescription' => $prescription->medication]) }}'">editar
                        precrição </button>
                @endif

                @if ($prescription->concluded == 1)
                <div style="background-color: green ; padding: 10px; color: white">
                    <p>prescrição concluída</p>

                </div>



                @endif

                @if ( $prescription->concluded == 0 &&  Auth::check() && in_array(Auth::user()->level, [3, 4, 1]))
                    <form action="{{ route('prescription.confirm', ['prescription' => $prescription->medication]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">


                        <input type="hidden" name="concluded" id="concluded" value="1"
                            {{ $prescription->occupied ? 'selected' : '' }}>


                        <button type="submit">confirmar </button>
                    </form>
                @endif

            </div>
        @endforeach
    @else
        <p>nenhuma prescricao encontrada</p>
    @endif







    @if (Auth::check() && in_array(Auth::user()->level, [4, 3, 1]))
        <button><a href="{{ route('diagnostic.create', ['patient' => $patient->patient]) }}">fazer um
                diagnostico</a></button>
        <button onclick="window.location.href='{{ route('prescription.create', ['patient' => $patient->patient]) }}'">fazer
            uma prescricao</button>
        <button onclick="window.location.href='{{ route('medication.create', ['patient' => $patient->patient]) }}'">fazer
            uma medicação</button>
    @endif
@endsection
