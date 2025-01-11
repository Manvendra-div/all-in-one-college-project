<?php
session_start();
include '../db/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form inputs
    $service = htmlspecialchars(trim($_POST['service']));
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $details = htmlspecialchars(trim($_POST['details']));

    // Validate required fields
    if (empty($service) || empty($name) || empty($email) || empty($phone) || empty($address)) {
        $_SESSION['flash_message'] = 'All fields are required!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['flash_message'] = 'Please enter a valid email address.';
    } else {
        // Prepare and execute the database query
        $query = "INSERT INTO bookings (service, name, email, phone, address, details, created_at) 
                  VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $service, $name, $email, $phone, $address, $details);

        if ($stmt->execute()) {
            $_SESSION['flash_message'] = 'Your booking request has been submitted successfully!';
        } else {
            $_SESSION['flash_message'] = 'There was an error submitting your booking. Please try again.';
        }

        $stmt->close();
    }

    // Close database connection
    $conn->close();

    // Redirect to booking page
    header('Location: ../views/booking.php');
    exit();
}
?>





