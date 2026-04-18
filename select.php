<?php
include 'db.php';
$result = $conn->query("SELECT * FROM users");
while($row = $result->fetch_assoc()) {
    echo $row['id'] . " - " . $row['name'] . " - " . $row['email'] . "<br>";
}
?>