<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Redesign</title>
    <style>
        /* General Footer Styles */
        footer {
            font-family: Arial, sans-serif;
            background-color: #333; /* Dark background */
            color: #fff; /* Light text */
            padding: 40px 20px;
        }

        /* Top Section */
        .footer-top {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #f9aa33; /* Bright orange background */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .footer-box {
            text-align: center;
            flex: 1;
            padding: 10px;
        }

        .footer-box .icon {
            font-size: 40px;
            margin-bottom: 10px;
            color: #333;
        }

        .footer-box h4 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .footer-box p {
            font-size: 14px;
            color: #333;
            margin: 0;
            line-height: 1.5;
        }

        /* Bottom Section */
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            padding: 20px 0;
        }

        .footer-column {
            flex: 1;
            margin: 10px;
        }

        .footer-column h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #f9aa33;
        }

        .footer-column p {
            font-size: 14px;
            color: #ddd;
            line-height: 1.6;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer-column ul li {
            margin-bottom: 5px;
        }

        .footer-column ul li a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column ul li a:hover {
            color: #f9aa33;
        }

        /* Icons Styling */
        .footer-box i {
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-top, .footer-bottom {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .footer-box, .footer-column {
                margin-bottom: 20px;
            }
        }

        /* Bottom Orange Section */
.footer-orange-bottom {
    background-color: #FFA726; /* Orange background */
    color: #000; /* Black text */
    text-align: center;
    padding: 10px 20px;
}

.footer-orange-bottom .footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-orange-bottom p {
    font-size: 14px;
    margin: 0;
}

.footer-orange-bottom .company-name {
    font-weight: bold;
    color: #fff; /* White text for emphasis */
}

.footer-orange-bottom .footer-link {
    font-size: 14px;
    color: #000; /* Black text */
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-orange-bottom .footer-link:hover {
    color: #444; /* Darker shade on hover */
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-orange-bottom .footer-content {
        flex-direction: column;
        gap: 10px;
    }
}

    </style>
    
</head>
<body>
    <footer>
        <!-- Top Section -->
        <div class="footer-top">
            <div class="footer-box">
                <i class="fas fa-envelope icon"></i>
                <h4>Email Us</h4>
                <p><strong>Email:</strong> <a href="mailto:leegapowertools@gmail.com">leegapowertools@gmail.com</a></p>
            </div>
            <div class="footer-box">
                <i class="fas fa-map-marker-alt icon"></i>
                <h4>Address</h4>
                <p>71 Wilkinson Road, Freetown</p>
            </div>
            <div class="footer-box">
                <i class="fas fa-phone-alt icon"></i>
                <h4>Call Us</h4>
                <p><strong>Phone:</strong> +232 33 333111 / +232-75-205545</p>
            </div>
        </div>

        <!-- Bottom Section -->
<div class="footer-bottom">
    <div class="footer-column">
        <h4>About Company</h4>
        <p>Leega Power and Tools is committed to delivering high-quality tools and exceptional services, empowering professionals and enthusiasts worldwide.</p>
    </div>
    <div class="footer-column">

    <h4>Quick Links</h4>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</div>

            <div class="footer-column">
    <h4>Working Hours</h4>
    <ul>
        <li>Monday: 8:00AM - 5:00PM</li>
        <li>Tuesday: 8:00AM - 5:00PM</li>
        <li>Wednesday: 8:00AM - 5:00PM</li>
        <li>Thursday: 8:00AM - 5:00PM</li>
        <li>Friday: 8:00AM - 5:00PM</li>
        <li>Saturday: 8:00AM - 5:00PM</li>
        <li>Sunday: Closed</li>
    </ul>
</div>

        </div>

 

    </footer>

           <!-- Bottom Orange Section -->
<div class="footer-orange-bottom">
    <div class="footer-content">
        <p>DESIGNED BY <span class="company-name">JAWARD INC. </span> © ALL RIGHTS RESERVED</p>
    </div>
</div>
   
</body>
</html>
