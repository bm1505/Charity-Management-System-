<?php
// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "charity_cms";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize filter variables
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Build SQL query with optional date filters
$sql = "SELECT notification_id, recipient_type, recipient_id, message, sent_at, address, contact, email FROM notifications";
if (!empty($start_date) && !empty($end_date)) {
    $sql .= " WHERE sent_at BETWEEN '$start_date' AND '$end_date'";
} elseif (!empty($start_date)) {
    $sql .= " WHERE sent_at >= '$start_date'";
} elseif (!empty($end_date)) {
    $sql .= " WHERE sent_at <= '$end_date'";
}

$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Error fetching notifications: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notifications</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .notification-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .notification-card h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .notification-card p {
            margin: 10px 0;
            color: #555;
        }

        .notification-card .date {
            font-size: 14px;
            color: #888;
        }

        .print-button {
            margin-bottom: 20px;
            text-align: right;
        }

        .print-button button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .print-button button:hover {
            background-color: #0056b3;
        }

        .filter-form {
            margin-bottom: 20px;
        }

        .filter-form label {
            margin-right: 10px;
        }

        .filter-form input[type="date"] {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .filter-form button {
            padding: 5px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .filter-form button:hover {
            background-color: #45a049;
        }

        @media print {
            header, nav, .print-button, .filter-form {
                display: none;
            }

            .container {
                box-shadow: none;
                border-radius: 0;
            }

            .notification-card {
                border: 1px solid #000;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Manage Notifications</h1>
        <nav>
            <a href="../admin.php">Dashboard</a>
            <a href="Donation.php">Donations</a>
            <a href="Volunteer.php">Volunteers</a>
            <a href="Beneficiary.php">Beneficiaries</a>
            <a href="Reporting.php">Reports</a>
            <a href="Notification.php">Notifications</a>
        </nav>
    </header>

    <div class="container">
        <!-- Filter Form -->
        <div class="filter-form">
            <form method="GET" action="">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value="<?= $start_date ?>">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" value="<?= $end_date ?>">
                <button type="submit">Filter</button>
            </form>
        </div>

        <!-- Print Button -->
        <div class="print-button">
            <button onclick="window.print()">Print Notifications</button>
        </div>

        <!-- Display Notifications -->
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Ensure the keys exist in the $row array
                $notification_id = isset($row['notification_id']) ? $row['notification_id'] : 'N/A';
                $recipient_type = isset($row['recipient_type']) ? $row['recipient_type'] : 'N/A';
                $recipient_id = isset($row['recipient_id']) ? $row['recipient_id'] : 'N/A';
                $message = isset($row['message']) ? $row['message'] : 'N/A';
                $sent_at = isset($row['sent_at']) ? $row['sent_at'] : 'N/A';
                $address = isset($row['address']) ? $row['address'] : 'N/A';
                $contact = isset($row['contact']) ? $row['contact'] : 'N/A';
                $email = isset($row['email']) ? $row['email'] : 'N/A';
        ?>
        <div class="notification-card">
           
            <p><strong>Recipient Type:</strong> <?= $recipient_type ?></p>
            <p><strong>Recipient ID:</strong> <?= $recipient_id ?></p>
            <p><strong>Message:</strong> <?= $message ?></p>
            <p><strong>Sent At:</strong> <?= $sent_at ?></p>
            <p><strong>Address:</strong> <?= $address ?></p>
            <p><strong>Contact:</strong> <?= $contact ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
        </div>
        <?php
            }
        } else {
            echo "<p style='text-align: center;'>No notifications found.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>