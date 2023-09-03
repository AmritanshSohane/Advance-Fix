<?php
session_start();
require 'db_connection.php';

if (isset($_POST['message']) && !empty($_POST['message'])) {
  $group_id = $_SESSION['group_id'];
  $username = $_SESSION['username'];
  $message = $_POST['message'];

  $query = "INSERT INTO chat_messages (group_id, username, message) VALUES ($group_id, '$username', '$message')";
  mysqli_query($conn, $query);
}

mysqli_close($conn);
?>
