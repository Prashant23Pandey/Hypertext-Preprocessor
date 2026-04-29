<?php
$servername = "localhost";
$username = "root";
$password = "";     
$dbname = "intern_db";
$conn = new mysqli($servername, 
$username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO intern_db (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color: green;'>Registration successful!</p>";
    } else {
        $message = "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Intern Registration</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        .form-container { max-width: 300px; border: 1px solid #ccc; padding: 20px; border-radius: 5px; }
        input { width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <?php echo $message; ?>
        <form method="post" action="">
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>  
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>