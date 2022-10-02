<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
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
