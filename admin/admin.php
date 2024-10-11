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

// Fetch all cars from the database
$sql = "SELECT id, name,image, price  FROM cars";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Cars</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }
        .card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .card h3 {
            font-size: 1.5em;
            color: #007bff;
        }
        .card p {
            color: #555;
        }
        .edit-button {
    background-color: #28a745; /* Green background */
    color: white;
    border: none;
    padding: 10px 15px; /* Increased padding for larger button */
    cursor: pointer;
    border-radius: 4px;
    text-decoration: none;
    text-align: center;
    display: inline-block;
    transition: background-color 0.3s; /* Transition for smooth effect */
}
.edit-button:hover {
    background-color: #218838; /* Darker green on hover */
}

    </style>
</head>
<body>
    <h2>Manage Cars</h2>
    <div class="card-container">
        <?php
        if ($result->num_rows > 0) {
            // Output data for each car
            while ($car = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($car['name']) . '</h3>';
                echo '<p>Price: ' . htmlspecialchars($car['price']) . '</p>';
                echo '<a class="edit-button" href="edit_car.php?id=' . $car['id'] . '" onclick="return confirm(\'Are you sure you want to edit this car?\');">Edit</a>';
                echo '</div>';
            }
            
        } else {
            echo "<p>No cars found.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
