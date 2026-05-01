<?php
require 'db.php';
require 'auth.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM access WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $role = strtolower(trim($user['role'])); // Clean role for 'USER' or 'user'
        $_SESSION['role'] = $role;
        header("Location: " . ($role === 'admin' ? 'admin_dashboard.php' : 'user_dashboard.php'));
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login | Secure CRUD System</title>
</head>
<body>
    <div class="container" style="max-width: 400px;">
        <h1 style="text-align:center;">Secure Login</h1>
        <?php if(isset($error)) echo "<p style='color:var(--danger); text-align:center;'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-edit" style="width:100%; margin-top:10px;">Login to Dashboard</button>
        </form>
        <p style="text-align:center; margin-top:20px;">
            New user? <a href="register.php">Create Account</a>
        </p>
    </div>
</body>
</html>