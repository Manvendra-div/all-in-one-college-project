// api/login.php
<?php
require_once "../db/db_connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize inputs
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Input validation
    if (empty($email) || empty($password)) {
        $_SESSION['flash_message'] = "All fields are required.";
        header('Location: ../views/login.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['flash_message'] = "Invalid email format.";
        header('Location: ../views/login.php');
        exit;
    }

    // Check user in the database
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Regenerate session ID for added security
            session_regenerate_id(true);

            // Store user details in the session
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;

            // Set flash message and redirect to home.php
            $_SESSION['flash_message'] = "Login successful. Welcome back, " . $username . "!";
            header('Location: ../views/home.php');  // Redirect to home.php
            exit;
        } else {
            $_SESSION['flash_message'] = "Invalid email or password.";
            header('Location: ../views/login.php');
            exit;
        }
    } else {
        $_SESSION['flash_message'] = "User not found.";
        header('Location: ../views/login.php');
        exit;
    }

    $stmt->close();
} else {
    $_SESSION['flash_message'] = "Invalid request method.";
    header('Location: ../views/login.php');
    exit;
}
?>




