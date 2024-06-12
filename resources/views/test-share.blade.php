@extends('layouts.app')

@section('og:title', 'Test Post Title')
@section('og:description', 'This is a test description for the post.')
@section('og:url', url()->current())
@section('og:image', asset('default-image.jpg'))

@section('content')
    <div class="container mt-5">
        <div class="card" style="max-width: 1200px; margin: 0 auto;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Test Post Title</h1>
                <button id="share-button" class="btn btn-outline-success">
                    <i class="fas fa-share-alt"></i> Share
                </button>
            </div>
            <div class="card-body">
                <p>This is a test description for the post.</p>
                <div class="image-container">
                    <img src="{{ asset('default-image.jpg') }}" alt="Default Image" class="post-image" />
                </div>
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
            const shareButton = document.getElementById('share-button');
            const shareModal = $('#share-modal');

            shareButton.addEventListener('click', function () {
                shareModal.modal('show');
            });

            const url = "{{ url()->current() }}";
            const title = "Test Post Title";
            const text = `Check out this post: ${title} ${url}`;

            document.getElementById('share-facebook').href = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            document.getElementById('share-twitter').href = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`;
            document.getElementById('share-whatsapp').href = `https://api.whatsapp.com/send?text=${encodeURIComponent(text)}`;
            document.getElementById('share-telegram').href = `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`;
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
            width: 100%;
            height: auto;
            max-height: 500px; /* Fixed height */
            object-fit: cover; /* Ensure the image fits within the container */
        }

        .image-container {
            width: 100%;
            max-height: 500px;
            overflow: hidden;
        }
    </style>
@endsection
