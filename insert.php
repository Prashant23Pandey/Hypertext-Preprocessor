<?php
include 'db.php';
$sql = "INSERT INTO users (name, email, password) 
VALUES ('Test User', 'test@gmail.com', '12345')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $conn->error;
}
?>