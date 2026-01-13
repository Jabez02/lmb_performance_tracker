<?php
session_start();
require_once __DIR__ . '/../config/database.php';

function login($username, $password) {
    
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM users WHERE  username = ? AND is_active = 1');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return false;
    }
    
    if (!password_verify($password, $user['password'])) {
        return false;
    }

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['full_name'] = $user['full_name'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['division_id'] = $user['division_id'];
    $_SESSION['section_id'] = $user['section_id'];

    return $user;
}

function isLoggedIn () {
    return isset($_SESSION['user_id']);
}

function requireLogin () {

    if(!isLoggedIn()) {
        header("Location: index.php");
        exit();
    }
    return true;
}

function checkRole ($allowed_roles) {
    $role = $_SESSION['role'];

    if (!in_array($role, $allowed_roles)) {
        header("Location: " .$role . "_dashboard.php");
        exit();    
    }
}

function logout () {
    session_destroy();
    header('Location: index.php');
    exit();
}