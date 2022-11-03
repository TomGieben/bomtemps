<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;
use App\models\productmenu;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::query()
            ->with('products')
            ->get();

        return view('menus.index', [
            'menus' => $menus,
        ]);
    }

    public function delete(Menu $menu) {
        $deleted = Menu::where('id', $menu->id)
        ->update([ 'deleted_at' => date("Y/m/d")]);

        return view('menus.delete', [
            'product' => $menu,
            'deleted' => $deleted,
        ]);
    }
    public function edit(Menu $menu) {
        return view('menus.edit', [
            'menu' => $menu,
            'products' => Product::all(),
        ]);
    }

    public function create() {
        return view('menus.create', [
            'products' => Product::all(),
        ]);
    }

    public function store(Request $request) {
        // price checken

        if(!Menu::where('slug', Str::slug($request->name))->exists()) {
            $menu = Menu::create([
                'slug' => Str::slug($request->naam),
                'name' => $request->naam,
                'description' => $request->Beschrijving,
                'price'=> $request->prijs,
            ]);

            foreach($request->products as $productId) {   
                // $menu->id
                // $productId
            }
        }

        // Overzicht pagina producten
        return redirect()->route('menu.index');
    }

    public function update(Menu $menu, Request $request) {
        if(!Menu::where('slug', Str::slug($request->slug))->where('id', '!=', $menu->id)->exists()) {
            Menu::where('id', $menu->id)
              ->update(['slug' => Str::slug($request->name),
                        'name' =>$request->name,
                        'description' => $request->description,
                        'price' => $request->price]);

            productmenu::where('menu_id', $menu->id)->delete();

            foreach($request->products as $productId) {   
                productmenu::create([
                    'product_id' => $productId,
                    'menu_id' => $menu->id,
                ]);
            }

        
        // Overzicht pagina producten
        return redirect()->route('menu.index');
    }
   }
}
