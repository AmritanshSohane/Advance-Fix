<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['group_id'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Group Chat - Chat Room</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    // Function to load chat messages
    function loadChat() {
      $.ajax({
        url: 'get_messages.php',
        type: 'GET',
        success: function(data) {
          $("#chat-messages").html(data);
          $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
        }
      });
    }

    // Function to send chat message
    function sendMessage() {
      var message = $("#message").val();
      $.ajax({
        url: 'send_message.php',
        type: 'POST',
        data: { message: message },
        success: function() {
          $("#message").val('');
          loadChat();
        }
      });
    }

    // Refresh chat messages every 2 seconds
    setInterval(loadChat, 2000);
  </script>
</head>
<body>
  <div class="chat-container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <div id="chat-messages"></div>
    <div class="message-input">
      <textarea id="message" placeholder="Type your message"></textarea>
      <button onclick="sendMessage()">Send</button>
    </div>
  </div>
</body>
</html>
