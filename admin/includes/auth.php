<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Store the current URL in session for redirecting after login
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    
    // Redirect to login page
    header("location: login.php");
    exit;
}

// Set session timeout (30 minutes of inactivity)
$inactive = 1800; // 30 minutes in seconds
$session_life = time() - $_SESSION['last_activity'];

if ($session_life > $inactive) {
    // Last request was more than 30 minutes ago
    session_unset(); // Unset $_SESSION variable
    session_destroy(); // Destroy session data
    header("Location: login.php?msg=timeout");
    exit;
}

// Update last activity time
$_SESSION['last_activity'] = time();
?>
