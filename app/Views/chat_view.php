<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat en Tiempo Real</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        h1 {
            color: #4CAF50;
            text-align: center;
        }
        #chat-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }
        #chat {
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            overflow-y: auto;
            background-color: #f9f9f9;
        }
        #chat div {
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 4px;
        }
        #chat div:nth-child(odd) {
            background-color: #e3f2fd;
        }
        #chat div:nth-child(even) {
            background-color: #bbdefb;
        }
        #message {
            width: 75%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
            font-size: 16px;
        }
        #send {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        #send:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="chat-container">
        <h1>Chat en Tiempo Real</h1>
        <div id="chat"></div>
        <input type="text" id="message" placeholder="Escribe tu mensaje">
        <button id="send">Enviar</button>
    </div>

    <script>
        var conn = new WebSocket('ws://localhost:8080');
        var chat = document.getElementById('chat');
        var sendButton = document.getElementById('send');
        var messageInput = document.getElementById('message');

        conn.onopen = function(e) {
            chat.innerHTML += '<div><strong>Sistema:</strong> Conexión establecida</div>';
        };

        conn.onmessage = function(e) {
            chat.innerHTML += '<div>' + e.data + '</div>';
            chat.scrollTop = chat.scrollHeight;
        };

        sendButton.onclick = function() {
            var msg = messageInput.value;
            if (msg.trim() !== '') {
                conn.send(msg);
                messageInput.value = '';
            }
        };

        // Permitir enviar el mensaje con Enter
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendButton.click();
            }
        });
    </script>
</body>
</html>
