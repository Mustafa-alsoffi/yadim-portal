@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>{{ $entry->get('title') }}</h1>
            </div>
            <div class="card-body">
                {!! $content !!}
                @if ($entry->get('images'))
                    @foreach ($entry->get('images') as $image)
                        <img src="{{ $image->url() }}" alt="{{ $image->alt }}" class="img-fluid" />
                    @endforeach
                @endif
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" id="like-button">Like</button>
                <span id="like-count">{{ $likesCount }}</span> likes
                <h3>Comments</h3>
                <ul id="comments-list">
                    @foreach($comments as $comment)
                        <li>{{ $comment->content }} - <strong>{{ $comment->user ? $comment->user->name : 'Anonymous' }}</strong></li>
                    @endforeach
                </ul>
                <form id="comment-form" method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="hidden" name="entry_id" value="{{ $entry->id() }}">
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Add a comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('like-button').addEventListener('click', function() {
            fetch('{{ route('like', ['entry' => $entry->id()]) }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => response.json()).then(data => {
                document.getElementById('like-count').textContent = data.likes_count;
            });
        });
    </script>
@endsection