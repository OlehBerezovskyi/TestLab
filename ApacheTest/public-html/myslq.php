<?php
$mysqli = new mysqli('DB01', 'root', 'password', 'dummy');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";

    // You might want to show them something nice, but we will simply exit
    exit;
}

$sql = "SELECT * FROM `TBL01`";
if (!$result = $mysqli->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
    exit;
}

echo "<ul>\n";
while ($row = $result->fetch_assoc()) {
    echo "<li><a href='" . $_SERVER['SCRIPT_FILENAME'] . "?aid=" . $row['name'] . "'>\n";
    echo $row['F01'];
    echo "</a></li>\n";
}
echo "</ul>\n";

$result->free();
$mysqli->close();
?>
