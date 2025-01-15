<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9; /* Light background for contrast */
            color: #333; /* Dark text for readability */
        }

        /* Contact Container Styling */
        .contact-container {
            width: 80%; /* Restrict the width */
            margin: 50px auto; /* Center the container */
            padding: 50px 20px;
            background-color: #fff; /* White background */
            text-align: center;
            border: 3px solid #f9aa33; /* Orange border */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }

        /* Contact Section */
        .contact-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #f9aa33; /* Vibrant orange for emphasis */
        }

        .contact-section p {
            font-size: 18px;
            margin: 10px 0;
        }

        .contact-section a {
            color: #f9aa33;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .contact-section a:hover {
            color: #ff8c00;
            text-decoration: underline;
        }

        /* Opening Hours Styling */
        .opening-hours {
            margin: 30px auto;
            padding: 20px;
            background-color: #fdf5e6; /* Light orange background */
            border-radius: 8px;
            text-align: center;
            width: 100%;
            max-width: 600px; /* Centered and limited width */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .opening-hours h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #f9aa33; /* Orange heading */
        }

        .opening-hours p {
            font-size: 16px;
            margin: 5px 0;
        }

        /* Social Icons Styling */
        .social-icons {
            margin: 40px auto 20px;
        }

        .social-icons h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #f9aa33; /* Orange heading */
        }

        .social-icons a {
            display: inline-block;
            margin: 0 10px;
            font-size: 20px;
            color: #f9aa33;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #ff8c00;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-container {
                padding: 30px 10px;
            }

            .contact-section h1 {
                font-size: 28px;
            }

            .contact-section p {
                font-size: 16px;
            }

            .opening-hours {
                padding: 15px;
            }

            .opening-hours h2 {
                font-size: 20px;
            }

            .social-icons a {
                font-size: 18px;
            }
        }
    </style>
</head>

<?php $pageTitle = "Contact"; ?>
<?php include 'header.php'; ?>

<main class="contact-container">
    <section class="contact-section">
        <h1>Contact Us</h1>
        <p><strong>Phone:</strong> +232 33 333111 / +232-75-205545</p>
        <p><strong>Email:</strong> <a href="mailto:leegapowertools@gmail.com">leegapowertools@gmail.com</a></p>
        <br>

        <div class="opening-hours">
            <h2>Opening Hours</h2>
            <p>Monday - Saturday: <strong>8:00 AM - 6:00 PM</strong></p>
            <p>Sunday: <strong>Closed</strong></p>
        </div>

        <div class="social-icons">
            <h2>Follow Us</h2>
            <a href="https://www.facebook.com/profile.php?id=100087250992734" target="_blank">Facebook</a>
            <a href="https://www.instagram.com/leega_powertools/" target="_blank">Instagram</a>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

<body>
<script src="script.js"></script>
</body>
</html>
