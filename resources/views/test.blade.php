<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Like Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .like-container {
            margin-top: 20px;
        }

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
    </style>
</head>
<body>
    <div class="container">
        <h1>Simple Like Counter</h1>
        <div class="like-container">
            <button id="like-button" class="like-button">👍 Like</button>
            <span id="like-count">0</span> likes
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let likeButton = document.getElementById('like-button');
            let likeCount = document.getElementById('like-count');
            let isLiked = false;

            likeButton.addEventListener('click', function() {
                if (isLiked) {
                    likeCount.textContent = parseInt(likeCount.textContent) - 1;
                    likeButton.textContent = '👍 Like';
                    likeButton.style.backgroundColor = '#007bff';
                } else {
                    likeCount.textContent = parseInt(likeCount.textContent) + 1;
                    likeButton.textContent = '👎 Unlike';
                    likeButton.style.backgroundColor = '#dc3545';
                }
                isLiked = !isLiked;
            });
        });
    </script>
</body>
</html>
