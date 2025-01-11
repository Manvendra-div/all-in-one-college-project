<?php
session_start();
?>
<?php if (isset($_SESSION['flash_message'])): ?>
    <div class="flash-message">
        <p><?php echo $_SESSION['flash_message']; ?></p>
        <div class="flash-progress"></div>
    </div>
    <?php unset($_SESSION['flash_message']); ?>
<?php endif; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/flash.css"> 
</head>
<body>
    <div class="register-container">
        <h1>Sign Up User</h1>
        <form action="../api/register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm_password" required>

            <button type="submit">Sign Up</button>
        </form>
        <p class="login-link">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
    <script src="../js/flash.js"></script>
</body>
</html>




