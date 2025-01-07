
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Birthday WhatsApp Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #4CAF50;
        }
        .status {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .status.success {
            color: green;
        }
        .status.error {
            color: red;
        }
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Send Birthday WhatsApp Messages</h1>
    <p>Click the button below to send birthday messages to all students and employees whose birthday is today.</p>

    <button class="button" onclick="sendBirthdayMessages()">Send Birthday Messages</button>

    <div id="status" class="status"></div>

    <script>
        function sendBirthdayMessages() {
            document.getElementById("status").innerHTML = "Sending birthday messages... Please wait.";
            document.getElementById("status").className = "status";

            const xhr = new XMLHttpRequest();
            xhr.open("GET", "send_birthday_messages.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("status").innerHTML = "Birthday messages sent successfully!";
                    document.getElementById("status").className = "status success";
                } else {
                    document.getElementById("status").innerHTML = "Error sending messages: " + xhr.statusText;
                    document.getElementById("status").className = "status error";
                }
            };
            xhr.onerror = function() {
                document.getElementById("status").innerHTML = "Request failed.";
                document.getElementById("status").className = "status error";
            };
            xhr.send();
        }
    </script>

</body>
</html>
