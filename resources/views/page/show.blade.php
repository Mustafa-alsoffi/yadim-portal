@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card" style="max-width: 1200px; margin: 0 auto;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>{{ $entry->get('title') }}</h1>
                <button id="share-button" class="btn btn-outline-success">
                    <i class="fas fa-share-alt"></i> Share
                </button>
            </div>
            <div class="card-body">
                {!! $content !!}
                @if ($entry->get('images'))
                    <div style="width: 100%; height: auto; position: relative;">
                        @foreach ($entry->get('images') as $image)
                            <img src="{{ $image->url() }}" alt="{{ $image->alt }}" class="post-image" />
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-start align-items-center">
                    <button id="like-button" class="btn btn-outline-primary mr-2">
                        👍 Like
                    </button>
                    <span id="like-count" class="mr-3">0</span> likes
                    <button id="comment-toggle" class="btn btn-outline-secondary">
                        💬 Comment
                    </button>
                </div>
            </div>
        </div>

        <div id="comments-section" class="card mt-4" style="display: none;">
            <div class="card-body">
                <h3>Comments</h3>
                <ul id="comments-list" class="list-unstyled">
                    @foreach($comments as $comment)
                        <li class="media my-3">
                            <img src="https://via.placeholder.com/40" class="mr-3" alt="User">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{{ $comment->user ? $comment->user->name : 'Anonymous' }}</h5>
                                {{ $comment->content }}
                            </div>
                        </li>
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

        <!-- Share Modal -->
        <div id="share-modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Share this post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <a id="share-facebook" href="#" class="btn btn-primary btn-share" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a id="share-twitter" href="#" class="btn btn-info btn-share" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a id="share-whatsapp" href="#" class="btn btn-success btn-share" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a id="share-telegram" href="#" class="btn btn-info btn-share" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                        <a id="share-instagram" href="#" class="btn btn-danger btn-share" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let likeButton = document.getElementById('like-button');
            let likeCount = document.getElementById('like-count');
            let isLiked = false;

            let commentToggleButton = document.getElementById('comment-toggle');
            let commentsSection = document.getElementById('comments-section');

            likeButton.addEventListener('click', function() {
                if (isLiked) {
                    likeCount.textContent = parseInt(likeCount.textContent) - 1;
                    likeButton.textContent = '👍 Like';
                    likeButton.classList.remove('btn-danger');
                    likeButton.classList.add('btn-outline-primary');
                } else {
                    likeCount.textContent = parseInt(likeCount.textContent) + 1;
                    likeButton.textContent = '👎 Unlike';
                    likeButton.classList.remove('btn-outline-primary');
                    likeButton.classList.add('btn-danger');
                }
                isLiked = !isLiked;
            });

            commentToggleButton.addEventListener('click', function() {
                if (commentsSection.style.display === 'none') {
                    commentsSection.style.display = 'block';
                } else {
                    commentsSection.style.display = 'none';
                }
            });

            const shareButton = document.getElementById('share-button');
            const shareModal = $('#share-modal');

            shareButton.addEventListener('click', function () {
                shareModal.modal('show');
            });

            const url = "{{ url()->current() }}";
            const title = "{{ $entry->get('title') }}";
            const text = `{!! addslashes($content) !!}`;

            document.getElementById('share-facebook').href = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            document.getElementById('share-twitter').href = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`;
            document.getElementById('share-whatsapp').href = `https://api.whatsapp.com/send?text=${encodeURIComponent(title + "\n" + url + "\n\n" + text)}`;
            document.getElementById('share-telegram').href = `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title + "\n\n" + text)}`;
            document.getElementById('share-instagram').href = `https://www.instagram.com/`; // Instagram sharing is only via app
        });
    </script>
@endsection

@section('styles')
    <style>
        .like-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .like-button:hover {
            background-color: #0056b3;
        }

        .btn-outline-primary, .btn-outline-secondary {
            display: flex;
            align-items: center;
            border: 1px solid transparent;
            border-radius: 5px;
            padding: 8px 12px;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
        }
        .media img {
            border-radius: 50%;
        }

        .card-footer {
            display: flex;
            align-items: center;
        }

        #like-button {
            margin-right: 10px;
        }

        .card-body h3 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .media {
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .btn-share {
            color: #01AEA5;
            margin: 0 5px;
        }
        .btn-share:hover {
            color: #ffffff;
        }

        .post-image {
            width: 500px;
            height: 500px; /* Fixed height */
            
        }

        .image-container {
            width: 100%;
        }
    </style>
@endsection
