<?php
session_start();
function restrictToAdmin(){
    if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: user_dashboard.php");
        exit();
    }
}
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
function isUser() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'user';
}
?>