<?php include '../includes/header.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="../css/services.css">
</head>

<main>
    <h1>Our Services</h1>
    <div class="services-container">
        <?php 
        // Define the services in an array for dynamic generation
        $services = [
            ["Home Cleaning", "Affordable home cleaning services to keep your space spotless.", "home-cleaning", "../assets/service1.jpg"],
            ["Plumbing", "Expert plumbing solutions for any repairs or installations.", "plumbing", "../assets/service2.jpg"],
            ["Electrical Services", "Professional electrical services to ensure safety and functionality.", "electrician", "../assets/service3.jpg"],
            ["Carpentry", "Custom carpentry services to bring your ideas to life.", "carpentry", "../assets/service4.jpg"],
            ["Gardening", "Transform your outdoor space with our expert gardening services.", "gardening", "../assets/service5.jpg"],
            ["Painting", "Give your walls a fresh look with our professional painting services.", "painting", "../assets/service6.jpg"],
            ["House Repair", "Fix all your house repair needs with our expert team.", "house-repair", "../assets/service7.jpg"],
            ["HVAC Services", "Ensure your heating and cooling systems work smoothly all year round.", "hvac-services", "../assets/service8.jpg"],
            ["Interior Design", "Our interior design services will help transform your living spaces.", "interior-design", "../assets/service9.jpg"],
            ["Moving Services", "Hassle-free moving services to make your relocation smooth and easy.", "moving-services", "../assets/service10.jpg"]
        ];

        // Loop through the services array and render cards
        foreach ($services as $service) {
            echo "
            <div class='service-card'>
                <img src='{$service[3]}' alt='{$service[0]}'>
                <h3>{$service[0]}</h3>
                <p>{$service[1]}</p>
                <a href='booking.php?service={$service[2]}' class='book-button'>Book Now</a>
            </div>";
        }
        ?>
    </div>
</main>

<?php include '../includes/footer.php'; ?>

<script src="../js/services.js"></script>
</body>
</html>




