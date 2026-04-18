<?php
include 'db.php';
$sql = "DELETE FROM users WHERE id=2";
if ($conn->query($sql) === TRUE) {
    echo "Deleted successfully";
}
?>