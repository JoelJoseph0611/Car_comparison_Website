<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cars";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the brand name from the URL
$brandName = isset($_GET['name']) ? $conn->real_escape_string($_GET['name']) : '';

// SQL query to fetch cars of the selected brand
$sql = "SELECT * FROM cars WHERE brand = '$brandName'"; 

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($brandName); ?> Cars</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #333;
            margin: 20px 0;
        }

        .car-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .car-item {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 280px;
            transition: transform 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .car-item:hover {
            transform: translateY(-5px);
        }

        .car-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .car-item h2 {
            font-size: 20px;
            color: #333;
            margin: 15px;
        }

        .car-item p {
            font-size: 16px;
            color: #555;
            margin: 0 15px 15px 15px;
        }

        .car-item p span {
            font-weight: bold;
            color: #ff6f61;
        }

        .no-cars-message {
            text-align: center;
            font-size: 20px;
            color: #666;
            margin: 30px 0;
        }
    </style>
</head>
<body>
    <h1><?php echo htmlspecialchars($brandName); ?> Cars</h1>
    <div class="car-list">
        <?php
        if ($result->num_rows > 0) {
            while ($car = $result->fetch_assoc()) {
                echo "<a href='car_details.php?id=" . urlencode($car['id']) . "' class='car-item'>";
                echo "<img src='" . htmlspecialchars($car['image']) . "' alt='" . htmlspecialchars($car['name']) . "'>";
                echo "<h2>" . htmlspecialchars($car['name']) . "</h2>";
                echo "<p>Price: <span>" . htmlspecialchars($car['price']) . "</span></p>";
                echo "</a>";
            }
        } else {
            echo "<p class='no-cars-message'>No cars found for this brand.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
