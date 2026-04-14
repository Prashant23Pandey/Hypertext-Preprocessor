<?php
include 'functions.php';
$name = $email = $role = "";
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $role = sanitizeInput($_POST["role"]);
    $message = validateInput($name, $email, $role);
}
?>
<!DOCTYPE html>
<html>
<head>  
    <title>Register Form</title>
</head>
<body>
<h2>Registration Form</h2>
<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Role:
    <select name="role">
        <option value="">Select Role</option>
        <option value="Student">Student</option>
        <option value="Teacher">Teacher</option>
    </select><br><br>
    <input type="submit" value="Submit">
</form>
<h3><?php echo $message; ?></h3>
</body>
</html>