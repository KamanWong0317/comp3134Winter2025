<?php
session_start();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $session_token = $_SESSION['confirmation'] ?? '';
    $posted_token = $_POST['confirmation'] ?? '';

    if ($session_token === $posted_token) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($username === 'host' && $password === 'pass') {
            $message = 'Login successful';
        } else {
            $message = 'Invalid credentials';
        }
    } else {
        $message = 'CSRF Token mismatch';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>CSRF Protected</title>
</head>
<body>
  <h1>CSRF Secure Login</h1>
  <form method="POST" action="csfr_action.php">
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
