<?php
session_start();
require 'db_connection.php';

if (isset($_POST['group_name']) && isset($_POST['group_password']) && isset($_POST['username']) && isset($_POST['password'])) {
  $group_name = $_POST['group_name'];
  $group_password = $_POST['group_password'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if the group name and password match in the database
  $query = "SELECT id FROM groups WHERE name = '$group_name' AND password = '$group_password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $group_id = mysqli_fetch_assoc($result)['id'];

    // Check if the username and password match in the database
    $query = "SELECT * FROM users WHERE username = '$username' AND group_id = $group_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc($result);
      if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['group_id'] = $user['group_id'];
        header("Location: chat.php");
        exit();
      }
    }
  }

  // Invalid group name, password, username, or password
  header("Location: index.php");
  exit();
}

mysqli_close($conn);
?>
