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
                            Tafel overzicht
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('tables.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Tafel
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body" style="height: 80vh;" id="container">
                {{ Table::render() }}
            </div>

            <div class="card-footer">
                <table class="table">
                    <thead>
                        <td>
                            Tafel
                        </td>
                        <td>
                            Klant
                        </td>
                        <td>
                            Tijden
                        </td>
                        <td>
                            Menu's
                        </td>
                        <td>
                            Totaal
                        </td>
                    </thead>
                    <tbody>
                        <td id="table">

                        </td>
                        <td id="customer">

                        </td>
                        <td id="time">

                        </td>
                        <td id="menus">

                        </td>
                        <td id="total">

                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layouts.table');
@endsection
