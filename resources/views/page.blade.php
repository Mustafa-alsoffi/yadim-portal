@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>{{ $page['title'] }}</h1>
    <p>{{ $page['content'] }}</p>

    <!-- Comments Section -->
    <div class="comments mt-5">
        <h3>Comments</h3>
        <ul>
            @foreach($comments as $comment)
            <li>{{ $comment->content }} - <small>{{ $comment->user->name }}</small></li>
            @endforeach
        </ul>
    </div>

    <!-- Add Comment Form -->
    <form action="{{ route('comments.store', $page['slug']) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Add a Comment:</label>
            <textarea name="content" id="content" rows="3" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
