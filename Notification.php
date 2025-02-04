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

if (isset($_POST['send_notification'])) {
    $recipient_type = $_POST['recipient_type'];
    $recipient_id = $_POST['recipient_id'];
    $message = $_POST['message'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    // Validate required fields
    if (empty($recipient_type) || empty($recipient_id) || empty($message) || empty($contact)) {
        echo "<script>alert('All required fields must be filled out.');</script>";
    } else {
        $sql = "INSERT INTO notifications (recipient_type, recipient_id, message, address, contact, email) 
                VALUES ('$recipient_type', '$recipient_id', '$message', '$address', '$contact', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Notification sent successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notification</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: rgb(144, 181, 245);
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

        /* Notification Form */
        .form-container {
            width: 60%;
            margin: 100px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #333;
        }

        input[type="text"],
        textarea,
        select,
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

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

    <!-- Notification Form -->
    <div class="form-container">
        <h2>Send Notification</h2>
        <form method="POST" action="">
            <label for="recipient_type">Recipient Type</label>
            <select name="recipient_type" id="recipient_type" required>
                <option value="volunteer">Volunteer</option>
                <option value="beneficiary">Beneficiary</option>
                <option value="donor">Donor</option>
            </select>

            <label for="recipient_id">Recipient ID</label>
            <input type="text" name="recipient_id" id="recipient_id" required>

            <label for="message">Message</label>
            <textarea name="message" id="message" required></textarea>

            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Optional">

            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" required placeholder="Enter contact number">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Optional">

            <button type="submit" name="send_notification">Send Notification</button>
        </form>
    </div>

   
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>