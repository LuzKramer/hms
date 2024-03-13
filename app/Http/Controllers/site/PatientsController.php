<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\patients;

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
    public function store(Request $request)
    {
        $new = DB::table('patients')->insert($request->except(['_token', '_method']));
        if ($new) {
            return redirect()->back()->with('message', ' Paciente adicionado com sucesso!');
        }
        return redirect()->back()->with(key: 'message', value: 'erro ao adicionar !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = DB::table('patients')->where('patient', $id)->first();


        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = DB::table('patients')->where('patient', $id)->first();
        $bloods = DB::table('bloods')->get();
        return view('patients.edit', compact('patient', 'bloods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = DB::table('patients')->where('patient', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'atualizado com sucesso!');
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
