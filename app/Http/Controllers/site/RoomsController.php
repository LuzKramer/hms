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

    public function adm()
    {
        $rooms =  DB::table('rooms')->get();


        return view('rooms.adm', ['rooms' => $rooms]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room_types = DB::table('room_types')->get();
        $blocks = DB::table('blocks')->get();

        return view('rooms.add', compact('room_types', 'blocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new = DB::table('rooms')->insert($request->except(['_token', '_method']));
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
        $room = DB::table('rooms')->where('room', $id)->first();
        $room_types = DB::table('room_types')->get();
        $blocks = DB::table('blocks')->get();

        return view('rooms.show', compact('room', 'room_types', 'blocks'));
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


    public function confirm(string $id){
        $room = DB::table('rooms')->where('room', $id)->first();

        return view('rooms.confirm', compact('room'));

    }



    public function update(Request $request, string $id)
    {
        $updated = DB::table('rooms')->where('room', $id)->update($request->except(['_token', '_method']));

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
        $delete = DB::table('rooms')->where('room', $id)->delete();
        return redirect()->route('rooms.adm');
    }


}
