<?php
// Database configuration
$servername = "localhost"; // Database server
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "cars";           // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total number of cars and inquiries
$carsCountResult = $conn->query("SELECT COUNT(*) AS count FROM cars");
$carsCount = $carsCountResult->fetch_assoc()['count'];

$inquiriesCountResult = $conn->query("SELECT COUNT(*) AS count FROM inquiries");
$inquiriesCount = $inquiriesCountResult->fetch_assoc()['count'];

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            color: #343a40;
        }
        header {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: white;
            padding: 20px;
            text-align: center;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
        .card {
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 12px;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .card-title {
            font-size: 2em;
            color: #007bff;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 1.5em;
            color: #555;
        }
        .navbar {
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#" style="font-weight: bold; font-size: 1.5rem; color: #007bff;">Car Comparison Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </div>
</nav>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-center p-4" onclick="window.location.href='admin.php'">
                    <div class="card-body">
                        <h2 class="card-title">Total Cars</h2>
                        <p class="card-text"><?php echo $carsCount; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-center p-4" onclick="window.location.href='adminContact.php'">
                    <div class="card-body">
                        <h2 class="card-title">Total Inquiries</h2>
                        <p class="card-text"><?php echo $inquiriesCount; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Car Comparison Website</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
