<?php
require_once "../db/db_connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize inputs
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Input validation
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['flash_message'] = 'All fields are required.';
        header("Location: ../views/register.php"); // Redirect to the registration page with error message
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['flash_message'] = 'Invalid email format.';
        header("Location: ../views/register.php"); // Redirect to the registration page with error message
        exit;
    }

    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
        $_SESSION['flash_message'] = 'Password must be at least 8 characters long, include at least one uppercase letter and one number.';
        header("Location: ../views/register.php"); // Redirect to the registration page with error message
        exit;
    }

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // If email exists, show a flash message and redirect back
        $_SESSION['flash_message'] = 'Email already exists. Please choose a different one.';
        header("Location: ../views/register.php"); // Redirect back to the registration page with error message
        exit;
    }

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Success, redirect to login page with success message
        $_SESSION['flash_message'] = 'Your account has been created successfully. Please log in.';
        header("Location: ../views/login.php");
        exit;
    } else {
        // If there is any other error, handle it
        $_SESSION['flash_message'] = 'An error occurred. Please try again later.';
        header("Location: ../views/register.php");
        exit;
    }

    $stmt->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>






