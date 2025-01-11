<?php include '../includes/header.php'; ?>

<head>
    <link rel="stylesheet" href="../css/contact.css">
</head>

<main>
    <section class="contact-section">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>Have questions or want to get in touch? We're here to help!</p>
        </div>

        <div class="contact-form-container">
            <form action="send_message.php" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>

        <div class="contact-info">
            <h2>Get in Touch</h2>
            <ul>
                <li><strong>Email:</strong> support@allinoneservices.com</li>
                <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                <li><strong>Address:</strong> 123 Main Street, City, Country</li>
            </ul>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>


</body>
</html>


