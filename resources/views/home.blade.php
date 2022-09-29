@php
use App\Models\Table;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Tafel overzicht</div>

            <div class="card-body">
                {{ Table::render() }}
            </div>
        </div>
    </div>
@endsection
