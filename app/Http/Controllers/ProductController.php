<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        // price checken

        if(!product::where('slug', Str::slug($request->name))->exists()) {
            product::create([
                'slug' => Str::slug($request->naam),
                'name' => $request->naam,
                'description' => $request->Beschrijving,
                'price'=> $request->prijs,
            ]);
        }

        // Overzicht pagina producten
        return redirect()->route('products.index');
    }

    public function edit(Product $product) {
        return view('products.edit', [
            'product' => $product,
        ]);
    }

     public function update(Product $product, Request $request) {
         if(!product::where('slug', Str::slug($request->slug))->where('id', '!=', $product->id)->exists()) {
             Product::where('id', $product->id)
               ->update(['slug' => Str::slug($request->name),
                         'name' => $request->name,
                         'description' => $request->description,
                         'price' => $request->price]);
         
         // Overzicht pagina producten
         return redirect()->route('products.index');
     }
    }
}
