<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cars";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $car_id = intval($_GET['id']); // Get the car ID from the request and sanitize it

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->bind_param("i", $car_id); // "i" specifies the variable type => integer

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $car_data = $result->fetch_assoc(); // Fetch the data as an associative array
        echo json_encode($car_data); // Return the data in JSON format
    } else {
        echo json_encode(["error" => "No car found"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "No car ID provided"]);
}

$conn->close();
?>
