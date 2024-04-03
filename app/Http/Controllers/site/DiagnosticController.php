<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $userId = Session::get('user_id');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
