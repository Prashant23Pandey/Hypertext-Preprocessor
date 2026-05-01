<?php
require 'auth.php';
restrictToAdmin(); 
?>
<!DOCTYPE html>
<html>
<head><title>Admin Panel</title></head>
<body>
    <h1>Welcome, Admin <?php echo $_SESSION['username']; ?></h1>
    <p>This is a highly restricted area. Only admins can see this.</p>
    <a href="logout.php">Logout</a>
</body>
</html>