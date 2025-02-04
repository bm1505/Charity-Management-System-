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

// Sanitize and retrieve form inputs
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// Prepare SQL statement to insert the data into the database
$sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";

// Prepare statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sss", $name, $email, $message);

// Execute the statement
if ($stmt->execute()) {
    $success_message = "Thank you for contacting us! Your message has been sent.";
} else {
    $error_message = "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message Submission</title>
    <style>
        /* Resetting default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            padding-top: 70px; /* For fixed navbar */
            color: #333;
        }

        /* Navbar style */
        nav {
            background-color: #2d3e50;
            padding: 16px 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }

        nav a {
            color: #fff;
            margin: 0 20px;
            text-decoration: none;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #f4a261;
        }

        nav a.active {
            color: #f4a261;
            font-weight: bold;
        }

        /* Message Section */
        .message-section {
            padding: 60px 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 100px auto;
            max-width: 900px;
            text-align: center;
        }

        .message-section h2 {
            font-size: 2.2em;
            color: #2d3e50;
            margin-bottom: 20px;
        }

        .message-section p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #666;
        }

        .message-section .back-button {
            padding: 14px 22px;
            background-color: #f4a261;
            border: none;
            color: white;
            font-size: 1.1em;
            cursor: pointer;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .message-section .back-button:hover {
            background-color: #e07b3f;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            nav a {
                font-size: 14px;
                margin: 0 10px;
            }

            .message-section h2 {
                font-size: 1.8em;
            }

            .message-section p {
                font-size: 1em;
            }

            .message-section .back-button {
                padding: 12px 20px;
                font-size: 1em;
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
        <a href="contact.php">Contact</a>
    </nav>

    <!-- Message Section -->
    <div class="message-section">
        <h2>Contact Message Submission</h2>
        <?php
        if (isset($success_message)) {
            echo "<p style='color: #2d3e50; font-weight: bold;'>$success_message</p>";
        } elseif (isset($error_message)) {
            echo "<p style='color: #e07b3f; font-weight: bold;'>$error_message</p>";
        }
        ?>
        <a href="contact.php" class="back-button">Back to Contact Form</a>
    </div>

</body>
</html>
