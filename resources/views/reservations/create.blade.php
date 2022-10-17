@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="card" method="POST" action="{{ route('reservations.store') }}">
            @method('POST')
            @csrf
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-auto me-auto">
                        <div class="card-title">Reservering toevoegen</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="table" class="form-label">
                                Tafel
                            </label>
                            <select class="form-select" name="table" required>
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}">{{ $table->unique_target }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="customer" class="form-label">
                                Klant
                            </label>
                            <select class="form-select" name="customer" required>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="from" class="form-label">
                                Van
                            </label>
                            <input type="datetime-local" class="form-control" name="from" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="to" class="form-label">
                                Tot
                            </label>
                            <input type="datetime-local" class="form-control" name="to" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Beschrijving
                            </label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection
