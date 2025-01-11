<?php
// Only start the session if it is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in (session exists)
$isLoggedIn = isset($_SESSION['user_id']);
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
    <title>All in One Services</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/flash.css">
</head>
<body>
<header>
    <nav>
        <div class="navbar">
            <div class="logo">
                <img src="../assets/mainlogo.png" alt="All in One Services" class="img">
                <h1>All in One</h1>
            </div>

            <div class="nav-toggle" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>

                <?php if ($isLoggedIn): ?>
                    <!-- Show Logout if user is logged in -->
                    <li><a href="/AllServices/api/logout.php">Logout</a></li>
                <?php else: ?>
                    <!-- Show Login and Sign Up if user is not logged in -->
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>

<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
        var flashMessage = document.querySelector('.flash-message');
        if (flashMessage) {
            flashMessage.classList.add('show');
        }
    });
</script>
<script src="../js/flash.js"></script>
</body>
</html>





