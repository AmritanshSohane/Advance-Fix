<?php
session_start();
require 'db_connection.php';

$group_id = $_SESSION['group_id'];

$query = "SELECT * FROM chat_messages WHERE group_id = $group_id ORDER BY timestamp";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  echo "<div class='message'>";
  echo "<span class='username'>{$row['username']}</span>";
  echo "<span class='timestamp'>{$row['timestamp']}</span>";
  echo "<p class='content'>{$row['message']}</p>";
  echo "</div>";
}

mysqli_close($conn);
?>
