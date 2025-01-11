<?php
$servername = "mysql-54c7058-ms1577239-8c99.c.aivencloud.com:12583"; // Usually 'localhost'
$username = "avnadmin"; // Default username for XAMPP/WAMP
$password = "AVNS_wfYUO0WsD_OJ8kkxjh5"; // Default password for XAMPP/WAMP
$database = "defaultdb"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
