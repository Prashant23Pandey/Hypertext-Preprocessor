<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = [
        "Name" => $_POST["name"],
        "Email" => $_POST["email"],
        "Age" => $_POST["age"]
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Registration Form</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Age: <input type="number" name="age" required><br><br>
    <input type="submit" value="Submit">
</form>
<?php
if (!empty($user)) {
    echo "<h3>User Data</h3>";
    echo "<table border='0' cellpadding='10'>";
    foreach ($user as $key => $value) {
        echo "<tr><th>$key</th><td>$value</td></tr>";
    }
    echo "</table>";
}
?>
</body>
</html>