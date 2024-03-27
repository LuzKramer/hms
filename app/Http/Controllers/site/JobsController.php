<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        return view('jobs.jobs', ['jobs' => job::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $new = DB::table('jobs')->insert($request->except(['_token', '_method']));
        if ($new) {
            return redirect()->back()->with('message', ' Profissão adicionada com sucesso!');
        }
        return redirect()->back()->with(key: 'message', value: 'erro ao adicionar !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = DB::table('jobs')->where('job', $id)->first();
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = DB::table('jobs')->where('job', $id)->first();
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = DB::table('jobs')->where('job', $id)->update($request->except(['_token', '_method']));

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

        $delete = DB::table('jobs')->where('job', $id)->delete();
        return redirect()->route('jobs.index');
    }
}
