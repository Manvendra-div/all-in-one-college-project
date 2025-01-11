<?php
session_start(); // Start the session

// If the user is logged in, redirect them to home.php
if (isset($_SESSION['user_id'])) {
    header('Location: views/home.php');
    exit;
} else {
    // If not logged in, redirect them to login.php
    header('Location: views/login.php');
    exit;
}
?>


