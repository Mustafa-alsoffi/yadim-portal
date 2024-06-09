<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Share</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .btn-share {
            color: #01AEA5;
        }
        .btn-share:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Sample Post Title</h1>
                <button id="share-button" class="btn btn-outline-success">
                    <i class="fas fa-share-alt"></i> Share
                </button>
            </div>
            <div class="card-body">
                <p>This is a sample post content to test the share functionality.</p>
            </div>
        </div>

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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const shareButton = document.getElementById('share-button');
            const shareModal = $('#share-modal');

            shareButton.addEventListener('click', function () {
                shareModal.modal('show');
            });

            const url = "http://localhost/test-share";
            const title = "Sample Post Title";
            const text = "This is a sample post content to test the share functionality.";

            document.getElementById('share-facebook').href = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            document.getElementById('share-twitter').href = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`;
            document.getElementById('share-whatsapp').href = `https://api.whatsapp.com/send?text=${encodeURIComponent(title + "\n" + url + "\n\n" + text)}`;
            document.getElementById('share-telegram').href = `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title + "\n\n" + text)}`;
            document.getElementById('share-instagram').href = `https://www.instagram.com/`; // Instagram sharing is only via app
        });
    </script>
</body>
</html>
