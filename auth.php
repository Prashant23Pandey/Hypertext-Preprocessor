<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
function restrictToAdmin() {
    if (!isAdmin()) {
        echo "<script>alert('Access Denied: Admins Only!'); window.location.href='user_dashboard.php';</script>";
        exit();
    }
}
function restrictToLoggedIn() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}
?>