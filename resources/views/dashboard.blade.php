@extends('layouts.app')

@section('content')
    @vite(['resources/css/dashboard.css', 'resources/js/app.js']) <!-- Link the CSS file and JS file using Vite -->

    <div id="app">
        <dashboard-component></dashboard-component>
    </div>
@endsection
