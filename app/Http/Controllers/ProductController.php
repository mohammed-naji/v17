<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::all(); // select * from products
        // $products = Product::paginate(20); // select * from products
        // $products = Product::orderBy('id', 'desc')->paginate(20);
        $products = Product::latest('id')->paginate(20);

        return view('products.index', compact('products'));

        // 501 / 20 = 21
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
    public function show($id)
    {
        // SELECT * FROM products WHERE id = $id
        // $product = Product::find($id);
        $product = Product::findOrFail($id);

        // if(!$product) {
        //     abort(404);
        // }

        return view('products.show', compact('product'));
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

// SELECT * FROM products LIMIT 10 OFFSET 20


//
