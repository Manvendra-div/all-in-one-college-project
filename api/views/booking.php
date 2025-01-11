<?php
session_start();
include '../includes/header.php'; 
?>

<head>
    
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="../css/flash.css">
    

</head>

<main>
    <section class="booking-section">
        <h1>Book a Service</h1>
        <p>Fill out the form below to book the service you need. Our team will get back to you shortly!</p>

        <!-- Display flash message -->
        <?php if (isset($_SESSION['flash_message'])): ?>
            <div class="message">
                <p><?php echo $_SESSION['flash_message']; ?></p>
                <div class="progress"></div>
            </div>
            <?php unset($_SESSION['flash_message']); ?>
        <?php endif; ?>

        <?php 
        // Get the service from the query parameter, default to an empty string
        $selectedService = isset($_GET['service']) ? htmlspecialchars($_GET['service']) : ''; 
        ?>

        <form action="../api/process_booking.php" method="POST" class="booking-form">
            <label for="service">Choose a Service:</label>
            <select id="service" name="service" required>
                <option value="">Select a Service</option>
                <?php
                $services = [
                    'home-cleaning' => 'Home Cleaning',
                    'plumbing' => 'Plumbing',
                    'electrician' => 'Electrical Services',
                    'carpentry' => 'Carpentry',
                    'gardening' => 'Gardening',
                    'painting' => 'Painting',
                    'house-repair' => 'House Repair',
                    'hvac-services' => 'HVAC Services',
                    'interior-design' => 'Interior Design',
                    'moving-services' => 'Moving Services'
                ];

                foreach ($services as $value => $label):
                    $selected = ($selectedService === $value) ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$label</option>";
                endforeach;
                ?>
            </select>

            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required aria-label="Your Name">

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required aria-label="Your Email">

            <label for="phone">Your Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required aria-label="Your Phone Number" pattern="^\+?[1-9]\d{1,14}$">

            <label for="address">Your Address:</label>
            <textarea id="address" name="address" rows="4" placeholder="Enter your address" required aria-label="Your Address"></textarea>

            <label for="details">Additional Details:</label>
            <textarea id="details" name="details" rows="4" placeholder="Any specific instructions or details" aria-label="Additional Details"></textarea>

            <button type="submit" class="submit-button">Book Now</button>
        </form>
    </section>
</main>
<script src="../js/flash.js"></script> 
<?php include '../includes/footer.php'; ?>





