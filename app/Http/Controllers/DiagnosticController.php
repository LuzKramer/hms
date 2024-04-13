<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use App\Models\Disease;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class DiagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // :0 TEM NADA AQUI!!!!!!!!!
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $patients = patient::all();
         $diseases = Disease::all();

        return view('diagnostics.add', compact('patients', 'diseases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->level;
        $date = now()->format('Y-m-d');
        $diagnostic = new Diagnostic([
            'patient' => $request->patient,
            'disease' => $request->disease,
            'descript' => $request->descript,
            'user_id' => $userId,
            'date' => $date]);

        $diagnostic->save(); // Save the diagnostic instance

        return redirect()->back()->with('message', 'Diagnostico adicionado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Diagnostic $diagnostic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnostic $diagnostic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnostic $diagnostic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnostic $diagnostic)
    {
        //
    }
}
