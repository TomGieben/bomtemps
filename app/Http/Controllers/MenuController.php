<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;

class MenuController extends Controller
{
    public function index() {
        $menus = menu::all();

        return view('products.index', [
            'menus' => $menus,
        ]);
    }
}
