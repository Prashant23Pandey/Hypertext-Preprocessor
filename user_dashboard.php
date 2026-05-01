<?php
require 'db.php';
require 'auth.php';
checkLogin();
$stmt = $pdo->prepare("SELECT * FROM access WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/style.css"></head>
<body>
    <div class="container">
        <h1>Welcome, <?= htmlspecialchars($user['username']) ?></h1>
        <div class="profile-card" style="background: white; padding: 20px; border-radius: 10px;">
            <p><strong>Email:</strong> <?= $user['email'] ?></p>
            <p><strong>Role:</strong> <?= strtoupper($user['role']) ?></p>
            <p><strong>Status:</strong> <span style="color: green;">● Active</span></p>
        </div>
        <br><a href="logout.php" class="btn btn-delete">Logout</a>
    </div>
</body>
</html>