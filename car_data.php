<?php
// Database connection parameters
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

// SQL query to retrieve car details
$sql = "SELECT id, name, image, price, engine_type, displacement, fuel_type, top_speed, emission_norm FROM cars";
$result = $conn->query($sql);

$carData = array();

// Fetch the results and store them in an array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $carData[] = $row;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .heading {
    font-size: 50px;                          /* Increased size for better visibility */
    color: white;                             /* White text color */
    text-align: center;                       /* Center alignment */
    margin: 40px 0;                          /* Margin above and below */
    padding: 20px;                           /* Padding around the text */
    background: linear-gradient(135deg,#FF3B30, #F8F8FF ); /* Gradient background */
    border-radius: 20px;                     /* More rounded corners */
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4); /* Stronger shadow effect */
    font-family: 'Arial', sans-serif;         /* Font style */
    transition: transform 0.3s ease, background-color 0.3s ease, color 0.3s ease; /* Smooth transitions */
    position: relative;                       /* Relative positioning for pseudo-elements */
    overflow: hidden;  
}

.heading:hover {
    transform: scale(1.05);                  /* Slightly enlarge the heading */
    background-color: #F5F5F5;                /* Light color close to white */
}



        h1 {
            margin: 0;
            font-size: 24px;
        }

        main {
            padding: 20px;
        }

        .car-details-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .car-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .car-image {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        h2.car-name {
            margin: 10px 0;
            font-size: 20px;
            color: #333;
        }

        .car-price {
            color: #4CAF50;
            font-size: 18px;
        }

        .car-specs {
            list-style: none;
            padding: 0;
        }

        .car-specs li {
            margin: 5px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1 class="heading">Car List</h1>
    <div class="car-details-container" id="car-details-container">
        <?php foreach ($carData as $car): ?>
            <div class="car-card" onclick="window.location.href='car_details.php?id=<?php echo $car['id']; ?>'">
                <img src="<?php echo $car['image']; ?>" alt="Car Image" class="car-image">
                <h2 class="car-name"><?php echo $car['name']; ?></h2>
                <p class="car-price">Price: <?php echo $car['price']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
