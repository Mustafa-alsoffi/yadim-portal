@extends('layouts.app')

@section('og:title', $entry->get('title'))
@section('og:description', strip_tags($content))
@section('og:url', url()->current())
@section('og:image', $entry->get('images') && $entry->get('images')->first() ? $entry->get('images')->first()->url() :
    asset('default-image.jpg'))

@section('content')
    <div class="container mt-5">
        <div class="card" style="max-width: 1200px; margin: 0 auto;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>{{ $entry->get('title') }}</h1>
                <button id="share-button" class="btn btn-outline-success">
                    <i class="fas fa-share-alt"></i> Share
                </button>
            </div>
            <div style="width:1500px;" class="card-body">
                {!! $content !!}
                @if ($entry->get('images'))
                    <div style="width: 50%" class="">
                        @foreach ($entry->get('images') as $image)
                            <img style="width:20% !important;" src="{{ $image->url() }}" alt="{{ $image->alt }}"
                                class="" />
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-start align-items-center">
                    <button id="like-button" class="btn {{ $isLiked ? 'btn-primary' : 'btn-outline-primary' }} mr-2">
                        {{ $isLiked ? '👍 Liked' : '👍 Like' }} (<span id="like-count">{{ $likesCount }}</span>)
                    </button>
                    <button id="comment-toggle" class="btn btn-outline-secondary">
                        💬 Comment (<span id="comment-count">{{ $commentsCount }}</span>)
                    </button>
                </div>
            </div>
        </div>

        <div id="comments-section" class="card mt-4" style="display: none;">
            <div class="card-body">
                <h3>Comments</h3>
                <ul id="comments-list" class="list-unstyled">
                    @foreach ($comments as $comment)
                        <li class="media my-3" data-id="{{ $comment->id }}">
                            <img src="https://via.placeholder.com/40" class="mr-3" alt="User">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">
                                    {{ $comment->user ? $comment->user->name : 'Anonymous' }}
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </h5>
                                <p id="comment-content-{{ $comment->id }}">{{ $comment->content }}</p>
                                @if (auth()->id() == $comment->user_id)
                                    <button class="btn btn-sm btn-link edit-comment"
                                        data-id="{{ $comment->id }}">Edit</button>
                                    <button class="btn btn-sm btn-link text-danger delete-comment"
                                        data-id="{{ $comment->id }}">Delete</button>
                                @endif
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
                        <button id="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <a id="share-facebook" href="#" class="btn btn-primary btn-share" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a id="share-twitter" href="#" class="btn btn-info btn-share" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                        <a id="share-whatsapp" href="#" class="btn btn-success btn-share" target="_blank"><i
                                class="fab fa-whatsapp"></i></a>
                        <a id="share-telegram" href="#" class="btn btn-info btn-share" target="_blank"><i
                                class="fab fa-telegram-plane"></i></a>
                        <a id="share-instagram" href="#" class="btn btn-danger btn-share" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let likeButton = document.getElementById('like-button');
            let likeCount = document.getElementById('like-count');
            let isLiked = {{ $isLiked ? 'true' : 'false' }};
            let commentToggleButton = document.getElementById('comment-toggle');
            let commentsSection = document.getElementById('comments-section');

            likeButton.addEventListener('click', function() {
                if (!@json(auth()->check())) {
                    alert('You must be logged in to like posts.');
                    return;
                }

                fetch("{{ route('like', $entry->slug()) }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        likeCount.textContent = data.likesCount;
                        if (isLiked) {
                            likeButton.innerHTML = '👍 Like (<span id="like-count">' + data.likesCount +
                                '</span>)';
                            likeButton.classList.remove('btn-primary');
                            likeButton.classList.add('btn-outline-primary');
                        } else {
                            likeButton.innerHTML = '👍 Liked (<span id="like-count">' + data
                                .likesCount + '</span>)';
                            likeButton.classList.remove('btn-outline-primary');
                            likeButton.classList.add('btn-primary');
                        }
                        isLiked = !isLiked;
                    })
                    .catch(error => console.error('Error:', error));
            });

            commentToggleButton.addEventListener('click', function() {
                if (commentsSection.style.display === 'none') {
                    commentsSection.style.display = 'block';
                } else {
                    commentsSection.style.display = 'none';
                }
            });

            document.querySelectorAll('.edit-comment').forEach(button => {
                button.addEventListener('click', function() {
                    let commentId = this.getAttribute('data-id');
                    let commentContent = document.getElementById('comment-content-' + commentId)
                        .innerText;

                    let newContent = prompt('Edit your comment:', commentContent);
                    if (newContent) {
                        fetch(`/comments/${commentId}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    content: newContent
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    document.getElementById('comment-content-' + commentId)
                                        .innerText = data.comment.content;
                                } else {
                                    alert('Error updating comment.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                });
            });

            document.querySelectorAll('.delete-comment').forEach(button => {
                button.addEventListener('click', function() {
                    let commentId = this.getAttribute('data-id');
                    if (confirm('Are you sure you want to delete this comment?')) {
                        fetch(`/comments/${commentId}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    document.querySelector(`li.media[data-id="${commentId}"]`)
                                        .remove();
                                } else {
                                    alert('Error deleting comment.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                });
            });

            const shareButton = document.getElementById('share-button');
            const shareModal = $('#share-modal');

            shareButton.addEventListener('click', function() {
                shareModal.modal('show');
            });

            const url = "{{ url()->current() }}";
            const title = "{{ $entry->get('title') }}";
            const text = `Check out this post: ${title} ${url}`;
            // close the modal when the user clicks the close button
            document.getElementById('close').addEventListener('click', function() {
                shareModal.modal('hide');
            });
            document.getElementById('share-facebook').href =
                `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            document.getElementById('share-twitter').href =
                `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`;
            document.getElementById('share-whatsapp').href =
                `https://api.whatsapp.com/send?text=${encodeURIComponent(text)}`;
            document.getElementById('share-telegram').href =
                `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`;
            document.getElementById('share-instagram').addEventListener('click', function() {
                alert("Instagram sharing is only available via the app.");
            });
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

        .btn-outline-primary,
        .btn-outline-secondary {
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
            width: 50% !important;
            height: auto;
            max-height: 500px;
            /* Fixed height */
            /* object-fit: cover; */
            /* Ensure the image fits within the container */
        }

        .image-container {
            width: 100% !important;
            max-height: 500px;
            overflow: hidden;
        }

        .btn-link {
            font-size: 0.9em;
            padding: 0;
            margin-left: 10px;
        }

        .btn-link.edit-comment {
            color: #007bff;
        }

        .btn-link.edit-comment:hover {
            color: #0056b3;
        }

        .btn-link.delete-comment {
            color: #dc3545;
        }

        .btn-link.delete-comment:hover {
            color: #c82333;
        }
    </style>
@endsection
