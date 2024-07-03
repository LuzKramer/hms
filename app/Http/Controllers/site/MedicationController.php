<?php

namespace App\Http\Controllers\site;

use App\Models\Medication;
use App\Models\patient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {


         $patient = patient::find($id);


        return view('medicacao.add', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->level;
        $date = now();
        $medication = new Medication([
            'patient' => $request->patient,

            'descript' => $request->descript,
            'worker' => $userId,
            'datetime' => $date]);

        $medication->save(); // Save the diagnostic instance

        return redirect()->back()->with('message', 'Medicação adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medication $medication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medication $medication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medication $medication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $medication)
    {
        //
    }
}
