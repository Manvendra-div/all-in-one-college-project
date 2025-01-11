<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Set flash message
$_SESSION['flash_message'] = 'Logout successful!';

// Redirect to the homepage or any other page
header('Location: ../views/login.php');
exit();
?>
