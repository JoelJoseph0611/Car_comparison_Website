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

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $car_id = $_GET['id'];
    
    // Fetch the car details from the database
    $sql = "SELECT * FROM cars WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();
    } else {
        echo "Car not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST["name"];
    $price = $_POST["price"];
    $on_road_price = $_POST["on_road_price"];
    $engine = $_POST["engine"];
    $engine_type = $_POST["engine_type"];
    $displacement = $_POST["displacement"];
    $max_power = $_POST["max_power"];
    $fuel = $_POST["fuel"];
    $mileage_arai = $_POST["mileage_arai"];
    $fuel_tank_capacity = $_POST["fuel_tank_capacity"];
    $emission_norm = $_POST["emission_norm"];
    $top_speed = $_POST["top_speed"];
    $front_suspension = $_POST["front_suspension"];
    $rear_suspension = $_POST["rear_suspension"];
    $steering_type = $_POST["steering_type"];
    $front_brake_type = $_POST["front_brake_type"];
    $rear_brake_type = $_POST["rear_brake_type"];
    $tyre_type = $_POST["tyre_type"];
    $wheel_size = $_POST["wheel_size"];
    $alloy_wheel_size_front = $_POST["alloy_wheel_size_front"];
    $alloy_wheel_size_rear = $_POST["alloy_wheel_size_rear"];
    $image = $_POST["image"]; // You can implement image upload as needed
    $brand = $_POST["brand"];

    // Update the car details in the database
    $update_sql = "UPDATE cars SET name = ?, price = ?, on_road_price = ?, engine = ?, engine_type = ?, displacement = ?, max_power = ?, fuel = ?, mileage_arai = ?, fuel_tank_capacity = ?, emission_norm = ?, top_speed = ?, front_suspension = ?, rear_suspension = ?, steering_type = ?, front_brake_type = ?, rear_brake_type = ?, tyre_type = ?, wheel_size = ?, alloy_wheel_size_front = ?, alloy_wheel_size_rear = ?, image = ?, brand = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssssssssssssssssssssi", $name, $price, $on_road_price, $engine, $engine_type, $displacement, $max_power, $fuel, $mileage_arai, $fuel_tank_capacity, $emission_norm, $top_speed, $front_suspension, $rear_suspension, $steering_type, $front_brake_type, $rear_brake_type, $tyre_type, $wheel_size, $alloy_wheel_size_front, $alloy_wheel_size_rear, $image, $brand, $car_id);

    if ($update_stmt->execute()) {
        echo "Car details updated successfully!";
    } else {
        echo "Error updating car details: " . $update_stmt->error;
    }
    
    // Close the update statement
    $update_stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        form {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="number"], input[type="url"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Edit Car Details</h2>
<form method="post" action="">
    <label for="name">Car Name</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($car['name']); ?>" required>

    <label for="price">Price</label>
    <input type="text" name="price" id="price" value="<?php echo htmlspecialchars($car['price']); ?>" required>

    <label for="on_road_price">On-Road Price</label>
    <input type="text" name="on_road_price" id="on_road_price" value="<?php echo htmlspecialchars($car['on_road_price']); ?>" required>

    <label for="engine">Engine</label>
    <input type="text" name="engine" id="engine" value="<?php echo htmlspecialchars($car['engine']); ?>" required>

    <label for="engine_type">Engine Type</label>
    <input type="text" name="engine_type" id="engine_type" value="<?php echo htmlspecialchars($car['engine_type']); ?>" required>

    <label for="displacement">Displacement</label>
    <input type="text" name="displacement" id="displacement" value="<?php echo htmlspecialchars($car['displacement']); ?>" required>

    <label for="max_power">Max Power</label>
    <input type="text" name="max_power" id="max_power" value="<?php echo htmlspecialchars($car['max_power']); ?>" required>
   
    <label for="fuel">Fuel Type</label>
    <input type="text" name="fuel" id="fuel" value="<?php echo isset($car['fuel']) ? htmlspecialchars($car['fuel']) : ''; ?>" required>

    <label for="mileage_arai">Mileage (ARAI)</label>
    <input type="text" name="mileage_arai" id="mileage_arai" value="<?php echo htmlspecialchars($car['mileage_arai']); ?>" required>

    <label for="fuel_tank_capacity">Fuel Tank Capacity</label>
    <input type="text" name="fuel_tank_capacity" id="fuel_tank_capacity" value="<?php echo htmlspecialchars($car['fuel_tank_capacity']); ?>" required>

    <label for="emission_norm">Emission Norm</label>
    <input type="text" name="emission_norm" id="emission_norm" value="<?php echo htmlspecialchars($car['emission_norm']); ?>" required>

    <label for="top_speed">Top Speed</label>
    <input type="text" name="top_speed" id="top_speed" value="<?php echo htmlspecialchars($car['top_speed']); ?>" required>

    <label for="front_suspension">Front Suspension</label>
    <input type="text" name="front_suspension" id="front_suspension" value="<?php echo htmlspecialchars($car['front_suspension']); ?>" required>

    <label for="rear_suspension">Rear Suspension</label>
    <input type="text" name="rear_suspension" id="rear_suspension" value="<?php echo htmlspecialchars($car['rear_suspension']); ?>" required>

    <label for="steering_type">Steering Type</label>
    <input type="text" name="steering_type" id="steering_type" value="<?php echo htmlspecialchars($car['steering_type']); ?>" required>

    <label for="front_brake_type">Front Brake Type</label>
    <input type="text" name="front_brake_type" id="front_brake_type" value="<?php echo htmlspecialchars($car['front_brake_type']); ?>" required>

    <label for="rear_brake_type">Rear Brake Type</label>
    <input type="text" name="rear_brake_type" id="rear_brake_type" value="<?php echo htmlspecialchars($car['rear_brake_type']); ?>" required>

    <label for="tyre_type">Tyre Type</label>
    <input type="text" name="tyre_type" id="tyre_type" value="<?php echo htmlspecialchars($car['tyre_type']); ?>" required>

    <label for="wheel_size">Wheel Size</label>
    <input type="text" name="wheel_size" id="wheel_size" value="<?php echo htmlspecialchars($car['wheel_size']); ?>" required>

    <label for="alloy_wheel_size_front">Alloy Wheel Size (Front)</label>
    <input type="text" name="alloy_wheel_size_front" id="alloy_wheel_size_front" value="<?php echo htmlspecialchars($car['alloy_wheel_size_front']); ?>" required>

    <label for="alloy_wheel_size_rear">Alloy Wheel Size (Rear)</label>
    <input type="text" name="alloy_wheel_size_rear" id="alloy_wheel_size_rear" value="<?php echo htmlspecialchars($car['alloy_wheel_size_rear']); ?>" required>

    <label for="image">Image URL</label>
    <input type="url" name="image" id="image" value="<?php echo htmlspecialchars($car['image']); ?>" required>

    <label for="brand">Brand</label>
    <input type="text" name="brand" id="brand" value="<?php echo htmlspecialchars($car['brand']); ?>" required>

    <input type="submit" value="Update Car Details">
</form>

</body>
</html>
