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
                            producten overzicht
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('products.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            product
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <td>Naam</td>
                        <td>Prijs</td>
                        <td>Beschrijving</td>
                        <td>Acties</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td width="450"><details>
                                    <summary></summary>
                                    <p>{{ $product->description }}</p>
                                    </details></td>
                                <td><a href="{{ route('products.edit', [$product]) }}" class="btn btn-warning">Bewerken</a></td>
                                <td><a href="{{ route('products.delete', [$product]) }}" class="btn btn-danger">verwijderen</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection