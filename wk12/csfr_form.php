<?php
session_start();
$_SESSION['confirmation'] = bin2hex(random_bytes(16));
$token = $_SESSION['confirmation'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>CSRF Protected</title>
</head>
<body>
  <h1>Login Form</h1>

  <form id="attackForm" method="POST" action="csfr_action.php">
  <input type="hidden" name="username" value="host">
  <input type="hidden" name="password" value="pass">
  
  <input type="hidden" name="confirmation" value="<?php echo $token; ?>"><br><br>
  </form>

<script>
    window.onload = function () {
      document.getElementById('attackForm').submit();
    };
  </script>

</body>
</html>
