<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_mock.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Dashboard</h2>
<h3>Welcome <?php echo $_SESSION["username"]; ?>!</h3>
<a href="logout.php">Logout</a>
</body>
</html>