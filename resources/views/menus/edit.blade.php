@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="card" method="POST" action="{{ route('menu.update', [$menu]) }}">
            @method('PUT')
            @csrf
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-auto me-auto">
                        <div class="card-title">menu bewerken</div>
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
                            <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <select class="form-select" name="products[]" multiple>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
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
                                Beschrijving
                            </label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $menu->description }}" required>
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
                            <input type="number" class="form-control" id="price" name="price" step=".01" value="{{ $menu->price }}" required>
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