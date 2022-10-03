<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function create() {
        return view('tables.create');
    }

    public function store(Request $request) {
        if(!Table::where('unique_target', $request->unique_target)->exists()) {
            Table::create([
                'unique_target' => $request->unique_target
            ]);
        }

        return redirect()->route('home');
    }

    public function location(Request $request) {
        $table = Table::where('id', $request->table)->first();
        $location = [
            'y' => $request->initialY,
            'x' => $request->initialX,
        ];

        $table->update([
            'location' => json_encode($location)
        ]);
    }
}
