@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="card" method="POST" action="{{ route('menu.store') }}">
            @method('POST')
            @csrf
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-auto me-auto">
                        <div class="card-title">product toevoegen</div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-text"></i>
                                Naam
                            </label>
                            <input type="text" class="form-control" id="naam" name="naam" required>
                        </div>
                    </div>
                </div>
            </div>

            <select class="form-select" name="products[]" multiple>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-text"></i>
                                Beschrijving
                            </label>
                            <input type="text" class="form-control" id="Beschrijving" name="Beschrijving" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-text"></i>
                                prijs
                            </label>
                            <input type="number" class="form-control" id="prijs" name="prijs" step=".01" required>
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
