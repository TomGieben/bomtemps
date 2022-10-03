<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        // price checken

        if(!product::where('slug', Str::slug($request->name))->exists()) {
            product::create([
                'slug' => Str::slug($request->naam),
                'name' => $request->naam,
                'descroption' => $request->omschrijving,
                'price'=> $request->prijs,
            ]);
        }

        // Overzicht pagina producten
        return redirect()->route('products.index');
    }
    public function index() {
        return view('products.index');
    }
}
