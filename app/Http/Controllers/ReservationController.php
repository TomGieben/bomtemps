<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Customer;
use App\Models\Table;

class ReservationController extends Controller
{
    public function index() {
        $reservations = Reservation::query()
            ->with('customer')
            ->with('user')
            ->with('table')
            ->get();

        return view('reservations.index', [
            'reservations' => $reservations,
        ]);
    }

    public function create() {
        return view('reservations.create', [
            'customers' => Customer::all(),
            'tables' => Table::all(),
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'customer' => 'required',
            'table' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        Reservation::create([
            'user_id' => auth()->user()->id,
            'customer_id' => $request->customer,
            'table_id' => $request->table,
            'from' => $request->from,
            'to' => $request->to,
            'description' => $request->description
        ]);

        return redirect(route('reservations.index'));
    }

    public function edit(Reservation $reservation) {
        return view('reservations.edit', [
            'customers' => Customer::all(),
            'tables' => Table::all(),
            'reservation' => $reservation,
        ]);
    }

    public function update(Request $request, Reservation $reservation) {
        $request->validate([
            'customer' => 'required',
            'table' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $reservation->update([
            'user_id' => auth()->user()->id,
            'customer_id' => $request->customer,
            'table_id' => $request->table,
            'from' => $request->from,
            'to' => $request->to,
            'description' => $request->description
        ]);

        return redirect(route('reservations.index'));
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return redirect(route('reservations.index'));
    }
}
