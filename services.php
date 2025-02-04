<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: rgb(127, 199, 247);
            color: #333;
        }

        /* Navbar style */
        nav {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
            text-transform: uppercase;
        }

        nav a:hover {
            color: #f4a261;
        }

        /* Services Section */
        .services-section {
            padding: 50px 20px;
            text-align: center;
            background: url('https://via.placeholder.com/1200x500') no-repeat center center/cover;
            color: white;
        }

        .services-section h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .services-section p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .services-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            background: #fff;
            margin-top: -50px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .service-card {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .service-card h2 {
            font-size: 2em;
            color: #f4a261;
            margin-bottom: 15px;
        }

        .service-card p {
            font-size: 1.1em;
            color: #555;
        }

        /* Footer style */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
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

    <!-- Services Section -->
    <section class="services-section">
        <h1>Our Services</h1>
        <p>We offer a variety of services to support communities and individuals in need.</p>
    </section>

    <!-- Services Content Section -->
    <div class="services-content">
        <div class="service-card">
            <h2>Fundraising Events</h2>
            <p>We organize fundraising events to gather resources for those in need. From charity runs to auctions, every event is designed to make a difference.</p>
        </div>

        <div class="service-card">
            <h2>Volunteer Programs</h2>
            <p>Join our volunteer programs to contribute your time and skills. We offer opportunities in education, healthcare, and community development.</p>
        </div>

        <div class="service-card">
            <h2>Community Support</h2>
            <p>We provide resources and support to local communities, including food drives, educational workshops, and health clinics.</p>
        </div>

        <div class="service-card">
            <h2>Awareness Campaigns</h2>
            <p>We run campaigns to raise awareness about critical issues such as poverty, education, and environmental sustainability.</p>
        </div>
    </div>

    <!-- Footer -->
    
</body>
</html>