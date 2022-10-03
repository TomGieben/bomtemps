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
            <div class="card-body" style="height: 80vh;" id="container">
                
            </div>
        </div>
    </div>
@endsection