<?php
require 'db.php';
require 'auth.php';

// Only let admins pass
if (!isset($_SESSION['role']) || strtolower(trim($_SESSION['role'])) !== 'admin') {
    header("Location: user_dashboard.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM access");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h1>Admin Control Center</h1>
        <table>
            <tr>
                <th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Action</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= $user['role'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $user['id'] ?>" class="btn-edit">Edit</a>
                    <a href="admin_dashboard.php?del=<?= $user['id'] ?>" class="btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h1>Admin Control Center</h1>
        <table>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= $user['role'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
