<!-- resources/views/wordpress/posts.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>WordPress Posts</h1>
    @foreach ($posts as $post)
        <div>
            <h2>{{ $post['title']['rendered'] }}</h2>
            <div>{!! $post['content']['rendered'] !!}</div>
        </div>
    @endforeach
@endsection
