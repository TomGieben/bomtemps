<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function show(Table $table) {

    }

    public function create() {
        return view('tables.create');
    }

    public function store(Request $request) {
        if(!isset($request->unique_target)) {
            return redirect()->back()->with('error', 'Voer een naam in.');
        }

        if(!Table::where('unique_target', $request->unique_target)->withTrashed()->exists()) {
            Table::create([
                'unique_target' => $request->unique_target,
                'location' => json_encode([
                    'y' => 0,
                    'x' => 0,
                ]),
            ]);
        } else {
            return redirect()->back()->with('error', 'De gebruikte naam bestaat al.');
        }

        return redirect()->route('home')->with('success', 'Tafel toegevoegd.');
    }

    public function location(Request $request) {
        $table = Table::query()
            ->where('id', $request->table)
            ->with('menus')
            ->with('reservations', function($query) {
                $query->with('customer');
            })
            ->first();

        $location = [
            'y' => $request->initialY ?? $table->getLocation('y'),
            'x' => $request->initialX ?? $table->getLocation('x'),
        ];

        $table->update([
            'location' => json_encode($location)
        ]);

        return $table;
    }
}
