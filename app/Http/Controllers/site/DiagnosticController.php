<?php

namespace App\Http\Controllers\site;

use App\Models\Diagnostic;
use App\Models\Disease;
use App\Models\patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function create(string $id)
    {

         $diseases = Disease::all();
         $patient = patient::find($id);


        return view('diagnostics.add', compact('patient', 'diseases'));
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
