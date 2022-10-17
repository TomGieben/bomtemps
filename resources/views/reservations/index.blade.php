@php
    use App\Models\Table;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <div class="card-title">
                            Reserveringen overzicht
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('reservations.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Reservering
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <td>Klant</td>
                        <td>Door</td>
                        <td>Tafel</td>
                        <td>Beschrijving</td>
                        <td>Van</td>
                        <td>Tot</td>
                        <td>Acties</td>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->customer->name }}</td>
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ $reservation->table->unique_target }}</td>
                                <td>
                                    <details>
                                        <summary>meer lezen</summary>
                                        <p>{{ $reservation->description }}</p>
                                    </details>
                                </td>
                                <td>{{ $reservation->from }}</td>
                                <td>{{ $reservation->to }}</td>
                                <td>
                                    <a href="{{ route('reservations.edit', [$reservation]) }}"
                                        class="btn btn-warning">Bewerken</a>
                                    <form id="delete-form" method="POST"
                                        action="{{ route('reservations.destroy', [$reservation]) }}">
                                        @method('delete')
                                        @csrf

                                        <button type="submit" class="btn btn-danger mt-1">
                                            Verwijder
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
