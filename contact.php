<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color:rgb(98, 98, 243);
            padding-top: 60px; /* For fixed navbar */
        }

        /* Navbar style */
        nav {
            background-color: #333;
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }

        nav a {
            color: white;
            margin: 0 20px;
            text-decoration: none;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        nav a:hover {
            color:rgb(172, 82, 247);
        }

        nav a.active {
            color: #f4a261;
            font-weight: bold;
        }

        /* Hero Section */
        .hero-section {
            padding: 120px 20px;
            text-align: center;
            background: url('https://via.placeholder.com/1200x500') no-repeat center center/cover;
            color: white;
            background-position: center;
        }

        .hero-section h1 {
            font-size: 3.5em;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .hero-section p {
            font-size: 1.3em;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
            color: #ddd;
        }

        /* Contact Form Section */
        .contact-form-section {
            padding: 50px 20px;
            text-align: center;
            background-color:rgb(114, 217, 248);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 50px auto;
            max-width: 800px;
        }

        .contact-form-section h2 {
            font-size: 2.5em;
            color: #f4a261;
            margin-bottom: 30px;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            padding: 12px;
            font-size: 1.1em;
            border: 2px solid #ddd;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #f4a261;
            outline: none;
        }

        .contact-form button {
            padding: 12px;
            background-color: #f4a261;
            border: none;
            color: white;
            font-size: 1.2em;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #e07b3f;
        }

        /* Map Section */
        .map-section {
            margin-top: 50px;
            text-align: center;
        }

        .map-section iframe {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 10px;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5em;
            }

            .contact-form-section h2 {
                font-size: 2em;
            }

            .contact-form button {
                font-size: 1.1em;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation bar -->
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="contact.php" class="active">Contact</a>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Get in Touch</h1>
        <p>If you have any questions or would like to learn more, feel free to contact us. We're here to help!</p>
    </section>

    <!-- Contact Form Section -->
    <div class="contact-form-section">
        <h2>Contact Us</h2>
        <form action="submit_form.php" method="POST" class="contact-form">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <h2>Our Location</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1730000.768239!2d36.6817168!3d-3.3744939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18277b8b70b9747b%3A0x3a09e4bc430899f5!2sArusha%2C%20Tanzania!5e0!3m2!1sen!2sus!4v1673703429380!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Charity Organization. All rights reserved.</p>
    </footer>

</body>
</html>
