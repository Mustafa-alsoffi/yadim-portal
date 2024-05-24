<!-- resources/views/wordpress/users.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>WordPress Users</h1>
    @foreach ($users as $user)
        <div>
            <h2>{{ $user['name'] }}</h2>
            <p>{{ $user['description'] }}</p>
        </div>
    @endforeach
@endsection
