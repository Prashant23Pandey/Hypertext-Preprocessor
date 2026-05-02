<?php
require 'db.php';
$message = "";
$messageType = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = $_POST['role']; 
    try {
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);      
        if ($stmt->execute([$user, $email, $pass, $role])) {
            $message = "Registration successful! You can now login.";
            $messageType = "success";
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { 
            $message = "Email already exists!";
            $messageType = "danger";
        } else {
            $message = "Database Error: " . $e->getMessage();
            $messageType = "danger";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day 14 | Secure Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="col-md-5 col-sm-10">
            <div class="card glass-card p-4 shadow-lg border-0">
                <div class="card-body">
                    <h3 class="text-center fw-bold mb-4">Create Account</h3>                   
                    <?php if ($message): ?>
                        <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                            <?php echo $message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    <form action="register.php" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter username" required>
                            <div class="invalid-feedback">Please choose a username.</div>
                        </div>                       
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="name@example.com" required>
                            <div class="invalid-feedback">Enter a valid email address.</div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" required minlength="6">
                            <div class="form-text">Must be at least 6 characters.</div>
                            <div class="invalid-feedback">Password is too short.</div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Select Account Type</label>
                            <select name="role" class="form-select form-select-lg" required>
                            <option value="" selected disabled>Choose your role...</option>
                            <option value="user">Standard User</option>
                            <option value="admin">Administrator</option>
                            </select>
                            <div class="invalid-feedback">Please select a role.</div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm">Register Now</button>
                    </form>        
                    <div class="text-center mt-4">
                        <span class="text-muted small">Already have an account?</span> 
                        <a href="login.php" class="text-decoration-none fw-bold small">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>