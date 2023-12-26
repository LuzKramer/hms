<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmaController extends Controller
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
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function index_cat()
    {
        $categories = DB::table('product_cats')->get();

        return view('pharma.products.index', compact('categories'));
    }


    public function index_prod(string $category)
    {
        $products = DB::table('products')
            ->join('product_cats', 'products.product_cat', '=', 'product_cats.product_cat')
            ->where('product_cats.name', $category) // Change this line to match your category name column
            ->select('products.*', 'product_cats.name as category_name')
            ->get();

        // Now you can pass $products and $category to your view
        return view('pharma.products.products', compact('products', 'category'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create_prod()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_prod(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show_prod(string $id)
    {





        return view('pharma.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_prod(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_prod(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_prod(string $id)
    {
        //
    }
}
