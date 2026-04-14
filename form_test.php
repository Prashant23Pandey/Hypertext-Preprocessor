<!DOCTYPE html>
<html>
<body>
    <h2>Submit Your Name</h2>
    <form method="POST" action="">
        <input type="text" name="user_name" placeholder="Enter name here" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['user_name'];
        if (!empty($name)) {
            echo "<h3>Output: Hello, " . 
            htmlspecialchars($name) . "!</h3>";
        }
    }
    ?>
</body>
</html>