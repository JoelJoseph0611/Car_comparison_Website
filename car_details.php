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

// Get the car ID from the URL
$carId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// SQL query to fetch details of the selected car
$sql = "SELECT id, name, image, price, engine_type, displacement, fuel_type, top_speed, on_road_price, engine, max_power, mileage_arai AS car_mileage, fuel_tank_capacity, emission_norm, front_suspension, rear_suspension, steering_type, front_brake_type, rear_brake_type, tyre_size, tyre_type, wheel_size, alloy_wheel_size_front, alloy_wheel_size_rear
        FROM cars WHERE id = ?";


$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $carId);
$stmt->execute();
$result = $stmt->get_result();

// Check if any results were returned
if ($result->num_rows > 0) {
    $carDetails = $result->fetch_assoc();
} else {
    echo "No car details found.";
    exit;
}

// Close the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="car_details.css">
    <title><?php echo htmlspecialchars($carDetails['name']); ?> - Car Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="car-details-container">
        <img src="<?php echo htmlspecialchars($carDetails['image']); ?>" alt="<?php echo htmlspecialchars($carDetails['name']); ?> Image" class="car-image">
        <h2><?php echo htmlspecialchars($carDetails['name']); ?></h2>
        <p class="car-price">Price: ₹<?php echo htmlspecialchars($carDetails['price']); ?></p>
        <ul class="car-specs">


                <li><strong>Engine Type:</strong> <span><?php echo htmlspecialchars($carDetails['engine_type']); ?></span></li>
                <li><strong>Displacement:</strong> <span><?php echo htmlspecialchars($carDetails['displacement']); ?> cc</span></li>
                <li><strong>Fuel Type:</strong> <span><?php echo htmlspecialchars($carDetails['fuel_type']); ?></span></li>
                <li><strong>Top Speed:</strong> <span><?php echo htmlspecialchars($carDetails['top_speed']); ?> km/h</span></li>
                <li><strong>Front Suspension:</strong> <span><?php echo htmlspecialchars($carDetails['front_suspension']); ?></span></li>
                <li><strong>Rear Suspension:</strong> <span><?php echo htmlspecialchars($carDetails['rear_suspension']); ?></span></li>
                <li><strong>Mileage:</strong> <span><?php echo htmlspecialchars($carDetails['car_mileage']); ?> km/l</span></li>
                <li><strong>Max Power:</strong> <span><?php echo htmlspecialchars($carDetails['max_power']); ?> bhp</span></li>
                <li><strong>Fuel Tank Capacity:</strong> <span><?php echo htmlspecialchars($carDetails['fuel_tank_capacity']); ?> liters</span></li>
                <li><strong>On Road Price:</strong> <span><?php echo htmlspecialchars($carDetails['on_road_price']); ?> INR</span></li>
                <li><strong>Engine:</strong> <span><?php echo htmlspecialchars($carDetails['engine']); ?></span></li>
                <li><strong>Tyre Size:</strong> <span><?php echo htmlspecialchars($carDetails['tyre_size']); ?></span></li>
                <li><strong>Tyre Type:</strong> <span><?php echo htmlspecialchars($carDetails['tyre_type']); ?></span></li>
                <li><strong>Wheel Size:</strong> <span><?php echo htmlspecialchars($carDetails['wheel_size']); ?> inches</span></li>
                <li><strong>Alloy Wheel Size (Front):</strong> <span><?php echo htmlspecialchars($carDetails['alloy_wheel_size_front']); ?> inches</span></li>
                <li><strong>Alloy Wheel Size (Rear):</strong> <span><?php echo htmlspecialchars($carDetails['alloy_wheel_size_rear']); ?> inches</span></li>
                <li><strong>Emission Norm:</strong> <span><?php echo htmlspecialchars($carDetails['emission_norm']); ?></span></li>
                <li><strong>Steering Type:</strong> <span><?php echo htmlspecialchars($carDetails['steering_type']); ?></span></li>
                <li><strong>Front Brake Type:</strong> <span><?php echo htmlspecialchars($carDetails['front_brake_type']); ?></span></li>
                <li><strong>Rear Brake Type:</strong> <span><?php echo htmlspecialchars($carDetails['rear_brake_type']); ?></span></li>


        </ul>
        <a href="car_data.php" class="back-button"><i class="fas fa-arrow-left"></i> Back to List</a>
    </div>
</body>
</html>
