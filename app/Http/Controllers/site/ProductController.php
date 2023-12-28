<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function cat()
    {
        $categories = DB::table('product_cats')->get();

        return view('products.categories', compact('categories'));
    }

    /**
     * Display a listing of the resource.
     */
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

    public function adm(string $category)
    {
        $products = DB::table('products')
            ->join('product_cats', 'products.product_cat', '=', 'product_cats.product_cat')
            ->where('product_cats.name', $category) // Change this line to match your category name column
            ->select('products.*', 'product_cats.name as category_name')
            ->get();

        // Now you can pass $products and $category to your view
        return view('products.adm', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('product_cats')->get();
        $companies = DB::table('companies')->get();

        return view('products.add', compact('categories', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new = DB::table('products')->insert($request->except(['_token', '_method']));
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
        $product = DB::table('products')
            ->join('product_cats', 'products.product_cat', '=', 'product_cats.product_cat')
            ->where('products.product', $id)
            ->select('product_cats.name as category_name', 'products.*')
            ->first();


        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = DB::table('products')->where('product', $id)->first();
        $categories = DB::table('product_cats')->get();
        $companies = DB::table('companies')->get();

        return view('products.edit', compact('product', 'categories', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = DB::table('products')->where('product', $id)->update($request->except(['_token', '_method']));

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
        $delete = DB::table('products')->where('product', $id)->delete();
        return redirect()->back();
    }
}
