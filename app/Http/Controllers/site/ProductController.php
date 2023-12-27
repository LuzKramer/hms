<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function index_cat()
    {
        $categories = DB::table('product_cats')->get();

        return view('products.categories', compact('categories'));
    }


    public function index(string $category)
    {
        $products = DB::table('products')
            ->join('product_cats', 'products.product_cat', '=', 'product_cats.product_cat')
            ->where('product_cats.name', $category) // Change this line to match your category name column
            ->select('products.*', 'product_cats.name as category_name')
            ->get();

        // Now you can pass $products and $category to your view
        return view('products.index', compact('products', 'category'));
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
       return view('products.show', ['product'=>$id]);
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
}
