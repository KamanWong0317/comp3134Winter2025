<?php
$servername = "localhost";
$username = "web";
$password = "pass";

try {
  $conn = new PDO("mysql:host=$servername;dbname=cybersecurity_db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


if (isset($_GET['firstname'])) {
    $firstname = $_GET['firstname'];

    $sql = $conn->prepare("SELECT * FROM users WHERE firstname = :firstname AND active = 1");
    $sql->bindParam(':firstname', $firstname);
    $sql->execute();
    $result = $sql->fetchAll();
}
?>

<form method="GET">
    <input type="text" name="firstname" placeholder="Enter first name">
    <button type="submit">Search</button>
</form>

<?php
if (isset($result)) {
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Active</th></tr>";
    foreach ($result as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['active']}</td>
              </tr>";
    }
    echo "</table>";
}
?>
