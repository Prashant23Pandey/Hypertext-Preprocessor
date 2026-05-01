<?php
require 'auth.php';
restrictToLoggedIn(); 
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <p>Welcome to your dashboard.</p>
    <?php if (isAdmin()): ?>
        <div style="background: #fcfa7e; padding: 10px; border: 1px solid #ccc;">
            <strong>Admin Notice:</strong> You have access to the <a href="admin.php">Admin Panel</a>.
        </div>
    <?php endif; ?>
    <a href="logout.php">Logout</a>
</body>
</html>