<?php
// Database connection details
$servername = "localhost";  // Update with your server name if necessary
$username = "root";  // Update with your database username
$password = "";  // Update with your database password
$dbname = "cars";  // Replace with your actual database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from the form submission using the POST method
$name = $_POST['name'];
$price = $_POST['price'];
$on_road_price = $_POST['on_road_price'];
$engine = $_POST['engine'];
$engine_type = $_POST['engine_type'];
$displacement = $_POST['displacement'];
$max_power = $_POST['max_power'];
$fuel_type = $_POST['fuel_type'];
$mileage_arai = $_POST['mileage_arai'];
$fuel_tank_capacity = $_POST['fuel_tank_capacity'];
$emission_norm = $_POST['emission_norm'];
$top_speed = $_POST['top_speed'];
$front_suspension = $_POST['front_suspension'];
$rear_suspension = $_POST['rear_suspension'];
$steering_type = $_POST['steering_type'];
$front_brake_type = $_POST['front_brake_type'];
$rear_brake_type = $_POST['rear_brake_type'];
$tyre_size = $_POST['tyre_size'];
$tyre_type = $_POST['tyre_type'];
$wheel_size = $_POST['wheel_size'];
$alloy_wheel_size_front = $_POST['alloy_wheel_size_front'];
$alloy_wheel_size_rear = $_POST['alloy_wheel_size_rear'];
$image = $_POST['image'];
$brand = $_POST['brand'];

// SQL query to insert the data into the 'vehicles' table
$sql = "INSERT INTO cars (name, price, on_road_price, engine, engine_type, displacement, max_power, fuel_type, mileage_arai, fuel_tank_capacity, emission_norm, top_speed, front_suspension, rear_suspension, steering_type, front_brake_type, rear_brake_type, tyre_size, tyre_type, wheel_size, alloy_wheel_size_front, alloy_wheel_size_rear, image, brand) 
VALUES ('$name', '$price', '$on_road_price', '$engine', '$engine_type', '$displacement', '$max_power', '$fuel_type', '$mileage_arai', '$fuel_tank_capacity', '$emission_norm', '$top_speed', '$front_suspension', '$rear_suspension', '$steering_type', '$front_brake_type', '$rear_brake_type', '$tyre_size', '$tyre_type', '$wheel_size', '$alloy_wheel_size_front', '$alloy_wheel_size_rear', '$image', '$brand')";

// Execute the query and check if the insertion was successful
if ($conn->query($sql) === TRUE) {
    echo "New car added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
