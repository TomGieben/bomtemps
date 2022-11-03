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
                            menus overzicht
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('menu.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            menu
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
                        <td>Producten</td>
                        <td>Acties</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->price }}</td>
                                <td width="450"><details>
                                    <summary></summary>
                                    <p>{{ $menu->description }}</p>
                                    </details></td>
                                <td width="450">
                                    <details>
                                    <summary></summary>
                                   <ul>
                                    @foreach($menu->products as $product)
                                        <li>
                                            {{ $product->name }}
                                        </li>
                                    @endforeach
                                   </ul>
                                    </details>
                                </td>
                                <td><a href="{{ route('menu.edit', [$menu]) }}" class="btn btn-warning">Bewerken</a></td>
                                <td><a href="{{ route('menu.delete', [$menu]) }}" class="btn btn-danger">verwijderen</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection