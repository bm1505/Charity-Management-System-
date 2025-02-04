<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charity Management System - Admin Dashboard</title>
    <style>
        /* Basic styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('images/charity-image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            text-align: center;
            padding-top: 80px;
        }

        header {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        header h1 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }

        nav {
            margin-top: 10px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ff8c00;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
            padding: 20px;
        }

        .module {
            width: 300px;
            background-color: rgba(0, 0, 0, 0.7);
            margin: 15px;
            padding: 20px;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .module:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .module h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .module p {
            font-size: 16px;
            line-height: 1.5;
        }

        .module a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #ff8c00;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .module a:hover {
            background-color: #e07b00;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .module {
                width: 100%;
                margin: 10px 0;
            }

            header h1 {
                font-size: 28px;
            }

            nav a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Charity Management System - Admin Dashboard</h1>
       
    </header>

    <div class="container">
        <!-- Donation Management Module -->
        <div class="module">
            <h3>Donation Management 🧡</h3>
          
            <a href="admin/Donation.php">Manage Donations</a>
        </div>

        <!-- Volunteer Management Module -->
        <div class="module">
            <h3>Volunteer Management 🤝</h3>
           
            <a href="admin/Volunteer.php">Manage Volunteers</a>
        </div>

        <!-- Beneficiary Module -->
        <div class="module">
            <h3>Beneficiary Management 👥</h3>
           
            <a href="admin/Beneficiary.php">Manage Beneficiaries</a>
        </div>

        <!-- Reporting System -->
        <div class="module">
            <h3>Reporting & Print 📊</h3>
           
            <a href="admin/Reporting.php">View Reports</a>
        </div>

        <!-- Notification System -->
        <div class="module">
            <h3>Notification System 📩</h3>
           
            <a href="admin/Notification.php">Manage Notifications</a>
        </div>
        <div class="module">
            <h3>contacts ☎️</h3>
           
            <a href="admin/contacts.php">Manage Contacts</a>
        </div>
    </div>

</body>
</html>
