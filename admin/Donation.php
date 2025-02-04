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

// Fetch donation data
$sql = "SELECT * FROM donations";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Error fetching donations: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donations</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your stylesheet here -->
    <style>
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

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Manage Donations</h1>
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
        <table>
            <tr>
                
                <th>Donor Name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Debugging: Print the entire row to check its structure
                    // echo "<pre>"; print_r($row); echo "</pre>";

                    // Ensure the keys exist in the $row array
                    $id = isset($row['id']) ? $row['id'] : 'N/A';
                    $donor_name = isset($row['donor_name']) ? $row['donor_name'] : 'N/A';
                    $amount = isset($row['amount']) ? $row['amount'] : 'N/A';
                    $donation_date = isset($row['donation_date']) ? $row['donation_date'] : 'N/A';
            ?>
            <tr>
                
                <td><?php echo $donor_name; ?></td>
                <td><?php echo $amount; ?></td>
                <td><?php echo $donation_date; ?></td>
                <td>
                    <a href="edit_donation.php?id=<?php echo $id; ?>">Edit</a> |
                    <a href="delete_donation.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this donation?');">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5' style='text-align: center;'>No donations found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>