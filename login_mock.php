<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["username"] = $_POST["username"];
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Login</h2>
<form method="post">
    Username: <input type="text" name="username" required>
    <input type="submit" value="Login">
</form>
</body>
</html>