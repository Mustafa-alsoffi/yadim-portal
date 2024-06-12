<!DOCTYPE html>
<html>

<head>
    <title>Chatbot</title>
</head>

<body>
    <h1>Chat with Amna</h1>
    <div id="chat-box">
        <div id="messages"></div>
        <input type="text" id="user-input" placeholder="Type a message..." />
        <button onclick="sendMessage()">Send</button>
    </div>

    <script>
        function sendMessage() {
            const userInput = document.getElementById('user-input').value;
            const messagesDiv = document.getElementById('messages');

            // Display user message
            const userMessageDiv = document.createElement('div');
            userMessageDiv.textContent = 'You: ' + userInput;
            messagesDiv.appendChild(userMessageDiv);

            fetch('https://pacific-beach-29100-b7b4fab4e338.herokuapp.com/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        message: userInput
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Display assistant response
                    const assistantMessageDiv = document.createElement('div');
                    assistantMessageDiv.textContent = 'Assistant: ' + data.response;
                    messagesDiv.appendChild(assistantMessageDiv);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
    </script>
</body>

</html>
