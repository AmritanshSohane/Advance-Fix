<!DOCTYPE html>
<html>
<head>
  <title>Group Chat - Login/Register</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
  <div class="login-container">
    <h2>Group Chat - Login/Register</h2>
    <form action="login.php" method="post">
      <input type="text" name="group_name" placeholder="City Name" required>
      <input type="password" name="group_password" placeholder="City PIN" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register</a></p>
  </div>
</body>
</html>
