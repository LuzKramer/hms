<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class RoomsController extends Controller
{

    public function index()
    {
        $rooms =  DB::table('rooms')->get();


        return view('rooms.rooms', ['rooms' => $rooms]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $room)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = DB::table('rooms')->where('room', $id)->first();
        $room_types = DB::table('room_types')->get();
        $blocks = DB::table('blocks')->get();

        return view('rooms.edit', compact('room', 'room_types', 'blocks'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $room)
    {
        //
    }
}
