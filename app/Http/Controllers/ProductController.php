<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|min:5',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'price' => 'required|numeric|gt:0',
            'content' => 'required'
        ]);

        // upload file
        $img = $request->file('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);

        // store in database
        // $product = new Product();
        // $product->name = $request->name;
        // $product->image = $img_name;
        // $product->price = $request->price;
        // $product->content = $request->content;
        // $product->save();

        $data = $request->except('_token', 'image');
        $data['image'] = $img_name;
        Product::create($data);

        // dd($data);

        // Product::create([
        //     'name' => $request->name,
        //     'image' => $img_name,
        //     'price' => $request->price,
        //     'content' => $request->content,
        // ]);



        // redirect to another page
        return redirect()
        ->route('products.index')
        ->with('msg', 'Product added successfully')
        ->with('type', 'warning');
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
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|min:5',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'price' => 'required|numeric|gt:0',
            'content' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $data = $request->except('_token', 'image');

        if($request->hasFile('image')) {
            // upload file
            File::delete(public_path('images/'.$product->image));
            $img = $request->file('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $data['image'] = $img_name;
        }

        $product->update($data);


        // redirect to another page
        return redirect()
        ->route('products.index')
        ->with('msg', 'Product updated successfully')
        ->with('type', 'warning');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);

        // $product = Product::findOrFail($id);

        // File::delete(public_path('images/'.$product->image)); // unlink

        // $product->delete();

        return 'Deleted';

        // return redirect()
        // ->route('products.index')
        // ->with('msg', 'Product deleted successfully')
        // ->with('type', 'error');
    }

    function trash() {
        $products = Product::onlyTrashed()->latest('id')->paginate(20);

        // $products = DB::select('select * from products where null deleted_at active = ?', [1])

        return view('products.trash', compact('products'));
    }

    function restore($id) {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()
        ->route('products.trash')
        ->with('msg', 'Product restored successfully')
        ->with('type', 'warning');
    }

    function forcedelete($id) {
        $product = Product::onlyTrashed()->findOrFail($id);

        $product = Product::findOrFail($id);

        File::delete(public_path('images/'.$product->image));

        $product->forceDelete();

        return redirect()
        ->route('products.trash')
        ->with('msg', 'Product deleted permanently successfully')
        ->with('type', 'warning');
    }

}

// SELECT * FROM products LIMIT 10 OFFSET 20


//
