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

// Fetch data from all tables
$tables = ['donations', 'beneficiaries', 'volunteers', 'contacts', 'notifications'];
$reports = [];

foreach ($tables as $table) {
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);
    $reports[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reports</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            color: #333;
        }

        /* Header Styles */
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        /* Navigation Styles */
        nav {
            background-color: #0056b3;
            padding: 10px;
            display: flex;
            justify-content: center;
            gap: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            border-radius: 4px;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Container Styles */
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }

        /* Print Button Styles */
        .print-button {
            text-align: right;
            margin-bottom: 20px;
        }

        .print-button button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .print-button button:hover {
            background-color: #218838;
        }

        /* Report Container Styles */
        .report-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .report-container h2 {
            margin-top: 0;
            font-size: 20px;
            font-weight: 700;
            color: #007bff;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 14px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: 500;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        /* Filter Styles */
        .filters {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filters select, .filters input, .filters button {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .filters button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filters button:hover {
            background-color: #0056b3;
        }

        /* Footer Styles */
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Reports</h1>
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
        <!-- Print Button -->
        <div class="print-button">
            <button onclick="window.print()">Print Report</button>
        </div>

        <div class="report-container">
            <h2>System Reports</h2>

            <!-- Filters -->
            <div class="filters">
                <select id="tableFilter">
                    <option value="">Select Table</option>
                    <?php foreach ($tables as $table): ?>
                        <option value="<?php echo $table; ?>"><?php echo ucfirst($table); ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="date" id="dateFilter" placeholder="Filter by Date">
                <button onclick="filterReports()">Apply Filters</button>
            </div>

            <!-- Display Reports -->
            <?php foreach ($reports as $table => $data): ?>
                <div id="<?php echo $table; ?>-report" class="table-report">
                    <h3><?php echo ucfirst($table); ?> Report</h3>
                    <table>
                        <thead>
                            <tr>
                                <?php if (!empty($data)): ?>
                                    <?php foreach (array_keys($data[0]) as $column): ?>
                                        <th><?php echo ucfirst(str_replace('_', ' ', $column)); ?></th>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row): ?>
                                <tr>
                                    <?php foreach ($row as $value): ?>
                                        <td><?php echo $value; ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Charity Management System | All Rights Reserved</p>
    </footer>

    <!-- JavaScript for Filtering -->
    <script>
        function filterReports() {
            const tableFilter = document.getElementById('tableFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;

            // Hide all reports initially
            document.querySelectorAll('.table-report').forEach(report => {
                report.style.display = 'none';
            });

            // Show filtered reports
            if (tableFilter) {
                const selectedReport = document.getElementById(`${tableFilter}-report`);
                if (selectedReport) {
                    selectedReport.style.display = 'block';
                }
            } else {
                document.querySelectorAll('.table-report').forEach(report => {
                    report.style.display = 'block';
                });
            }
        }
    </script>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>