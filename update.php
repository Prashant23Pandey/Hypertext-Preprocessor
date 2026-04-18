<?php
include 'db.php';
$sql = "UPDATE users SET name='Updated User' WHERE id=1";
if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
}
?>