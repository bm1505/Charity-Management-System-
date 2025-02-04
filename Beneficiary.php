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

// Alter table to add new columns if they don't exist

// Add Beneficiary
if (isset($_POST['add_beneficiary'])) {
    $full_name = $_POST['full_name'];
    $category = $_POST['category'];
    $needs = $_POST['needs'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO beneficiaries (full_name, category, needs, age, gender, date_added) 
            VALUES ('$full_name', '$category', '$needs', '$age', '$gender', NOW())";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Beneficiary added successfully!');</script>";
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
    <title>Beneficiary Management</title>
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
            background: rgba(127, 200, 243, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input, select, textarea, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #0056b3;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: inline-block;
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

        /* Responsive Styles */
        @media (max-width: 768px) {
            .form-container {
                width: 80%;
            }
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

    <!-- Beneficiary Form -->
    <div class="form-container">
        <h2>Add Beneficiary</h2>
        <form method="POST" action="">
            <label>Full Name:</label>
            <input type="text" name="full_name" required>

            <label>Category:</label>
            <select name="category" required>
                <option value="orphan">Orphan</option>
                <option value="disabled">Disabled</option>
            </select>

            <label>Needs:</label>
            <textarea name="needs" required></textarea>

            <label>Age:</label>
            <input type="number" name="age" min="1" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <button type="submit" name="add_beneficiary">Add Beneficiary</button>
        </form>
    </div>

   
</body>
</html>
