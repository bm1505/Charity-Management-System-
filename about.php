<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: rgb(127, 199, 247);
            color: #333;
        }

        /* Navbar style */
        nav {
            background-color: #333;
            padding: 15px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 20px;
            text-decoration: none;
            font-size: 18px;
            text-transform: uppercase;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #f4a261;
        }

        /* About Section */
        .about-section {
            padding: 80px 20px;
            text-align: center;
            background: url('https://via.placeholder.com/1200x500') no-repeat center center/cover;
            color: rgb(10, 10, 10);
            background-size: cover;
        }

        .about-section h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .about-section p {
            font-size: 1.2em;
            margin-bottom: 30px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.8);
        }

        /* About Content */
        .about-content {
            max-width: 1000px;
            margin: -40px auto 80px;
            padding: 40px 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .about-content h2 {
            font-size: 2.5em;
            color: #f4a261;
            margin-bottom: 15px;
        }

        .about-content p {
            font-size: 1.1em;
            margin-bottom: 25px;
            color: #555;
            line-height: 1.8;
        }

        /* Footer style */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
    </nav>

    <!-- About Section -->
    <section class="about-section">
        <h1>Welcome to Our Charity Organization</h1>
        <p>We strive to make a difference in the world by helping those in need.</p>
    </section>

    <!-- About Content Section -->
    <div class="about-content">
        <h2>Our Mission</h2>
        <p>Our mission is to improve the lives of individuals and communities through charitable donations, volunteer efforts, and raising awareness for important causes. We believe in the power of people coming together to make a real impact.</p>

        <h2>What We Do</h2>
        <p>We organize fundraising events, volunteer opportunities, and donate resources to those in need. We also support local communities through various programs aimed at enhancing education, health, and well-being.</p>

        <h2>Join Us</h2>
        <p>We welcome anyone who wants to contribute their time, skills, or donations to help us achieve our mission. Whether you’re looking to volunteer or make a donation, your support is invaluable to us. Together, we can make a difference!</p>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Charity Organization. All rights reserved.</p>
    </footer>
</body>
</html>
