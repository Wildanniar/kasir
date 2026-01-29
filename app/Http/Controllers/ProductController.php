<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'        => 'required|unique:products',
            'name'        => 'required',
            'category_id'=> 'required',
            'price_sell' => 'required|numeric',
            'stock'      => 'required|numeric',
            'image'      => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products','public');
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success','Produk berhasil ditambahkan');
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'code'        => 'required|unique:products,code,'.$product->id,
            'name'        => 'required',
            'category_id'=> 'required',
            'price_sell' => 'required|numeric',
            'stock'      => 'required|numeric',
            'image'      => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products','public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success','Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success','Produk berhasil dihapus');
    }
}
