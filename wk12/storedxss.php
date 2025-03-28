<?php

$data = file_get_contents("storedxss.txt");

echo "<h1>Stored XSS txt</h1>";
echo "<p>User message:</p>";
echo "<div><script>document.location.href="/directory_traversal_part1.php"</script></div>";
?>
