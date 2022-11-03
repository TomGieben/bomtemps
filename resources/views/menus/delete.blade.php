@extends('layouts.app')

@section('content')
    <div class="container">
        @if($deleted == 1)
            <p>dit item is met succes verwijdert<p>
        @endif
        <p>u wordt automatisch terug gestuurt naar het menu overzicht</p>
    </div>
    <meta http-equiv="refresh" content="3;url=http://bontemps.test/menus" />
@endsection