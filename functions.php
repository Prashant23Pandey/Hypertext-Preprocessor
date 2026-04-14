<?php
function sanitizeInput($data) {
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data;
}
function validateInput($name, $email, $role) {
    if (empty($name) || empty($email) || empty($role)) {
        return "All fields are required!";
    }
    return "Valid input!";
}
?>