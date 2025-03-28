<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'host' && $password === 'pass') {
        $message = 'Login successful!';
    } else {
        $message = 'Login failed.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>CSFR</title>
</head>
<body>
  <h1>Login Form</h1>

  <form method="POST" action="csfr.php">
    <label>Username:</label><br>
    <input type="text" name="username"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit">Submit</button>
  </form>

  <div id="splash">
    <?php if ($message) echo "<p>$message</p>"; ?>
  </div>
</body>
</html>

