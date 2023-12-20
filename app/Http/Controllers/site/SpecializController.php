<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecializController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializ = DB::table('specializations')->get();

        return view('specializations.specializations', ['specializ' => $specializ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specializations.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new = DB::table('specializations')->insert($request->except(['_token', '_method']));

        if ($new) {
            return redirect()->back()->with('message', ' Especialização adicionada com sucesso!');
        }
        return redirect()->back()->with(key: 'message', value: 'Erro ao adicionar!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $specializa = DB::table('specializations')->where('specialization', $id)->first();
        return view('specializations.show', compact('specializa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specializa = DB::table('specializations')->where('specialization', $id)->first();
        return view('specializations.edit', compact('specializa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = DB::table('specializations')->where('specialization', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'Atualizado com sucesso!');
        }
        return redirect()->back()->with(key: 'message', value: 'Erro ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table('specializations')->where('specialization', $id)->delete();
        return redirect()->route('specializ.index');
    }
}
