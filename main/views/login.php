<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/flash.css"> <!-- Add flash message styles -->
</head>
<body>
    <?php if (isset($_SESSION['flash_message'])): ?>
        <div class="flash-message show">
            <p><?php echo $_SESSION['flash_message']; ?></p>
            <div class="flash-progress"></div>
        </div>
        <?php unset($_SESSION['flash_message']); ?>
    <?php endif; ?>

    <div class="login-container">
        <h1>User Login</h1>
        <form action="../api/login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <p class="register-link">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </div>

    <script src="../js/flash.js"></script> <!-- Add flash message script -->
</body>
</html>

