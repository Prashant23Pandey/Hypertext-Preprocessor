<?php
require 'db.php';
require 'auth.php';
restrictToAdmin();
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE access SET username = ?, role = ? WHERE id = ?");
    $stmt->execute([$_POST['username'], $_POST['role'], $id]);
    header("Location: admin_dashboard.php");
}
$user = $pdo->prepare("SELECT * FROM access WHERE id = ?");
$user->execute([$id]);
$data = $user->fetch();
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/style.css"></head>
<body>
    <div class="container" style="max-width: 500px;">
        <h1>Modify User</h1>
        <form method="POST">
            <input type="text" name="username" value="<?= $data['username'] ?>" required>
            <select name="role">
                <option value="user" <?= $data['role'] == 'user' ? 'selected' : '' ?>>Standard User</option>
                <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
            </select>
            <br><br>
            <button type="submit" class="btn btn-edit" style="width:100%">Save Changes</button>
        </form>
    </div>
</body>
</html>