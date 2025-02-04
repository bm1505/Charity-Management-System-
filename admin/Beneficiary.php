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

// Fetch beneficiary data
$sql = "SELECT beneficiary_id, full_name, category, needs, age, gender FROM beneficiaries";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Error fetching beneficiaries: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Beneficiaries</title>
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

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <header>
        <h1>Manage Beneficiaries</h1>
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
        <!-- Display success or error messages -->
        <?php if (isset($_GET['message'])) { ?>
            <div class="message success"><?= htmlspecialchars($_GET['message']) ?></div>
        <?php } ?>
        <?php if (isset($_GET['error'])) { ?>
            <div class="message error"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php } ?>

        <table>
            <tr>
                <th>Beneficiary ID</th>
                <th>Full Name</th>
                <th>Category</th>
                <th>Needs</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Ensure the keys exist in the $row array
                    $id = isset($row['beneficiary_id']) ? $row['beneficiary_id'] : 'N/A';
                    $name = isset($row['full_name']) ? $row['full_name'] : 'N/A';
                    $category = isset($row['category']) ? $row['category'] : 'N/A';
                    $needs = isset($row['needs']) ? $row['needs'] : 'N/A';
                    $age = isset($row['age']) ? $row['age'] : 'N/A';
                    $gender = isset($row['gender']) ? $row['gender'] : 'N/A';
            ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td><?= $category ?></td>
                <td><?= $needs ?></td>
                <td><?= $age ?></td>
                <td><?= $gender ?></td>
                <td>
                    <a href="edit_beneficiary.php?id=<?= $id ?>">Edit</a> |
                    <a href="delete_beneficiary.php?id=<?= $id ?>" onclick="return confirm('Are you sure you want to delete this beneficiary?');">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='7' style='text-align: center;'>No beneficiaries found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>