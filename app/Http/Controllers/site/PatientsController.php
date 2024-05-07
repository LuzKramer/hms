<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Diagnostic;
use App\Models\patient;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\GeminiService;



class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = DB::table('patients')->get();


        return view('patients.index', compact('patients'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bloods = DB::table('bloods')->get();
        return view('patients.add', compact('bloods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, GeminiService $geminiService)
    {

        $userId = Auth::user()->level;
        $date = now();

        // Concatenate all the patient information into a single string
        $Info = "Nome: " . $request->name . ",\n" .
            "Sexo: " . $request->sex . ",\n" .
            "Data de Nascimento: " . $request->born . ",\n" .
            "Tipo Sanguíneo: " . $request->blood . ",\n" .
            "Temperatura: " . $request->temperature . ",\n" .
            "Pressão Sistólica: " . $request->systolic_pressure . ",\n" .
            "Pressão Diastólica: " . $request->diastolic_pressure . ",\n" .
            "Frequência Cardíaca: " . $request->heart_rate . ",\n" .
            "Sintomas: " . $request->symptoms . ",\n" .
            "Histórico Médico: " . $request->medical_history . ",\n" .
            "Observações: " . $request->observations . ",\n" .
            "Data: " . $date;

            if ($geminiService->hasConnection()) {
                // Call the GeminiService function for diagnosis
                $result = $geminiService->diagnostico($Info);
            } else {
                $result = "Não foi possivel fazer o diagnostico com a IA !";

            }

        $patient = new patient([
            'name' => $request->name,
            'sex' => $request->sex,
            'born' => $request->born,
            'monitoring' => $request->monitoring,
            'urgency' => $request->urgency,
            'cpf' => $request->cpf,
            'codsus' => $request->codsus,
            'email' => $request->email,
            'img' => $request->img,
            'blood' => $request->blood,
            'weight' => $request->weight,
            'height' => $request->height,
            'phone' => $request->phone,
            'temperature' => $request->temperature,
            'systolic_pressure' => $request->systolic_pressure,
            'diastolic_pressure' => $request->diastolic_pressure,
            'heart_rate' => $request->heart_rate,
            'symptoms' => $request->symptoms,
            'medical_history' => $request->medical_history,
            'observations' => $request->observations,
            'ai_resp' => $result,
            'date' => $date
        ]);

        try {
            $new = $patient->save();
        } catch (\Exception $e) {
            dd($e);
        }


        if ($new) {
            return redirect(route('patients.show', $patient->patient))->with('message', 'Paciente adicionado com sucesso!');
        }
        return redirect()->back()->with('message', 'Erro ao adicionar!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = patient::find($id);

        if ($patient->height != 0 && $patient->weight != 0) {
            $height = $patient->height / 100; // Convert height to meters
            $weight = $patient->weight;

            $imc = $weight / ($height * $height); // Calculate BMI

            $imc = number_format($imc, 2);
        } else {
            $imc = null; // Set to null if height or weight is 0
        }

        $diagnostics = Diagnostic::where('patient', $id)->orderBy('date')->get();

        $room = room::where('room', $patient->room)->first();





       return view('patients.show', compact('patient', 'imc', 'diagnostics', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = DB::table('patients')->where('patient', $id)->first();
        $bloods = DB::table('bloods')->get();
        $rooms = room::get()->where('occupied', false);
        return view('patients.edit', compact('patient', 'bloods', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = patient::where('patient', $id)->update($request->except(['_token', '_method']));


        if ($updated) {
            return redirect(route('patients.show', $id))->with('message', 'Atualizado com sucesso!');
        }
        return redirect()->back()->with(key: 'message', value: 'erro ao atualizar !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
