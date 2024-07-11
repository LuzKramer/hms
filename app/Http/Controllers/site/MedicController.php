<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\patient;
use Illuminate\Support\Facades\Auth;



class MedicController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function board()
    {
        return view('medic.board');
    }

    public function presindex(string $id)
    {
        $prescriptions = Prescription::where('patient', $id)->get()->join('users)', 'users.id', '=', 'medications.worker')->get('users.name');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function prescreate(string $id)
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

        return view('medications.add', compact('patient', 'imc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function presstore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'descript' => 'required',
            'patient' => 'required',
        ]);


        // Retrieve the authenticated user's ID and current date/time
        $userId = Auth::user()->level;
        $date = now();

        // Create a new Prescription instance with the provided data
        $prescription = new Prescription([
            'descript' => $request->descript,
            'patient' => $request->patient,
            'worker' => $userId,
            'datetime' => $date
        ]);

        // Save the prescription to the database
        $prescription->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Prescrição adicionada com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function presshow(string $id)
    {
        $prescription = Prescription::where('medication', $id)
            ->join('users', 'users.id', '=', 'prescriptions.worker')
            ->select('prescriptions.*', 'users.name as name')
            ->first();


        $patient = patient::find($prescription->patient);



        return view('medications.show', compact('prescription', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function presedit(string $id)
    {
        $prescription = Prescription::find($id);
        return view('medications.edit', compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function presupdate(Request $request, string $id)
    {
        $request->validate([
            'descript' => 'required',
        ]);

        $updated = Prescription::where('medication', $id)->update(['descript' => $request->descript]);

        if ($updated) {
            return redirect()->to("/prescricao/$id")->with('message', 'Prescrição atualizada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao atualizar a prescrição.');
        }
    }

    public function presconfirm(Request $request, string  $id)
    {

        $request->validate([
            'concluded' => 'required',
        ]);

        $updated = Prescription::where('medication', $id)->update(['concluded' => $request->concluded]);
        return redirect()->back()->with('message', 'Prescrição concluída com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
