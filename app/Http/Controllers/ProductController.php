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
        $products = Product::all();
        return response()->json($products);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'rating' => 'required',
        ]);

        $placeholder = "https://placehold.co/600x400";
        $product = Product::create([
            'name'  => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => $request->rating,
            'image' => $placeholder,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'rating' => 'required',
        ]);

        $product->update([
            'name'  => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => $request->rating,
            'image' => $request->image,
        ]);
        
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
