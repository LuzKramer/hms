<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blocks = DB::table('blocks')->get();

        return view('blocks.blocks', ['blocks' => $blocks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blocks.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new = DB::table('blocks')->insert($request->except(['_token', '_method']));

        if ($new) {
            return redirect()->back()->with('message', ' Block added successfully!');
        }

        return redirect()->back()->with(key: 'message', value: 'Error adding block!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $block = DB::table('blocks')->where('block', $id)->first();

        return view('blocks.show', compact('block'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $block = DB::table('blocks')->where('block', $id)->first();

        return view('blocks.edit', compact('block'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = DB::table('blocks')->where('block', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'Updated successfully!');
        }

        return redirect()->back()->with(key: 'message', value: 'Error updating block!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table('blocks')->where('block', $id)->delete();

        return redirect()->route('blocks.index');
    }
}
