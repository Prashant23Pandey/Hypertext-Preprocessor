<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role']; 
    $checkEmail = $pdo->prepare("SELECT id FROM access WHERE email = ?");
    $checkEmail->execute([$email]);
    if ($checkEmail->rowCount() > 0) {
        $error = "Email is already registered!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO access (username, email, password, role) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$username, $email, $hashedPassword, $role])) {
            header("Location: login.php?msg=Success");
            exit();
        } else {
            $error = "Registration failed.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css"> <title>Register | Advanced CRUD</title>
</head>
<body>
    <div class="container" style="max-width: 450px;">
        <h1 style="text-align:center;">Create Account</h1>
        <?php if(isset($error)) echo "<p style='color:var(--danger); text-align:center;'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="username" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="email@example.com" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Min 6 characters" required>
            </div>  
            <div class="form-group">
                <label>Account Type</label>
                <select name="role" required style="width:100%; padding:10px; border-radius:8px;">
                    <option value="user">Standard User</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
            <button type="submit" class="btn btn-edit" style="width:100%; margin-top:15px;">Register</button>
        </form>
        <p style="text-align:center; margin-top:20px;">
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>
</body>
</html>