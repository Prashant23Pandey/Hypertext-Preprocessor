<!DOCTYPE html>
<html>
<head>
    <title>Loops Test</title>
</head>
<body>
<h2>For Loop</h2>
<?php
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i <br>";
}
?>
<h2>While Loop</h2>
<?php
$i = 1;
while ($i <= 5) {
    echo "Number: $i <br>";
    $i++;
}
?>
<h2>Do-While Loop</h2>
<?php
$i = 1;
do {
    echo "Number: $i <br>";
    $i++;
} while ($i <= 5);
?>
<h2>Foreach Loop</h2>
<?php
$colors = array("Red", "Green", "Blue");
foreach ($colors as $color) {
    echo "Color: $color <br>";
}
?>
</body>
</html>