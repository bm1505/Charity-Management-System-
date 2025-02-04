<?php
// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "charity_cms";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Donation
if (isset($_POST['add_donation'])) {
    $donor_name = $_POST['donor_name'];
    $donation_type = $_POST['donation_type'];
    $amount = $_POST['amount'];
    $donation_date = $_POST['donation_date'];
    $status = $_POST['status'];
    $contact = $_POST['contact']; // New contact field
    $location = $_POST['location']; // New location field

    $sql = "INSERT INTO donations (donor_name, donation_type, amount, donation_date, status, contact, location) 
            VALUES ('$donor_name', '$donation_type', '$amount', '$donation_date', '$status', '$contact', '$location')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Donation added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charity Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: url('images/charity-image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        /* Navbar Styles */
        header {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #ff8c00;
        }

        /* Form Styles */
        .form-container {
            width: 50%;
            margin: 100px auto;
            padding: 20px;
            background: rgba(129, 211, 243, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        /* Footer Styles */
        footer {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            text-align: center;
            color: #fff;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="Donation.php">Donations</a>
            <a href="Volunteer.php">Volunteers</a>
            <a href="Beneficiary.php">Beneficiaries</a>
            <a href="Reporting.php">Reports</a>
            <a href="Notification.php">Notifications</a>
        </nav>
    </header>

    <!-- Donation Form -->
    <div class="form-container">
        <h2>Add Donation</h2>
        <form method="POST" action="">
            <label>Donor Name:</label>
            <input type="text" name="donor_name" required>
            
            <label>Donation Type:</label>
            <select name="donation_type" required>
                <option value="money">Money</option>
                <option value="food">Food</option>
                <option value="clothing">Clothing</option>
                <option value="medical">Medical</option>
                <option value="other">Other</option>
            </select>

            <label>Amount:</label>
            <input type="number" name="amount" step="0.01" required>

            <label>Donation Date:</label>
            <input type="date" name="donation_date" required>

            <label>Status:</label>
            <select name="status" required>
                <option value="Pending">Pending</option>
                <option value="Paid">Paid</option>
                <option value="Delivered">Delivered</option>
            </select>

            <label>Contact:</label>
            <input type="text" name="contact" placeholder="Email or Phone" required>

            <label>Location:</label>
            <input type="text" name="location" placeholder="City, State, or Country" required>

            <button type="submit" name="add_donation">Add Donation</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Charity Management System | All Rights Reserved</p>
    </footer>

</body>
</html>