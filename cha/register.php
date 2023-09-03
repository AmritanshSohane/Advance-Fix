<!DOCTYPE html>
<html>
<head>
  <title>Group Chat - Register</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
  <div class="login-container">
    <h2>Group Chat - Register</h2>
    <form action="register.php" method="post">
      <input type="text" name="group_name" placeholder="City Name" required>
      <input type="password" name="group_password" placeholder="City PIN" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
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

    // Insert the new user into the 'users' table
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password, group_id) VALUES ('$username', '$hashed_password', $group_id)";
    mysqli_query($conn, $query);

    // Redirect the user to the login page
    header("Location: index.php");
    exit();
  } else {
    echo "Invalid city group name or PIN";
  }
}

mysqli_close($conn);
?>
