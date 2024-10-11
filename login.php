<?php
// Database connection details
$servername = "localhost"; 
$db_username = "root"; 
$db_password = "";    
$dbname = "cars"; 

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType']; // Get user type (user/admin/company)

    // Query based on user type
    if ($userType === 'user') {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    } elseif ($userType === 'admin') {
        $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    } elseif ($userType === 'company') {
        $sql = "SELECT * FROM companies WHERE username = '$username' AND password = '$password'";
    }

    $result = $conn->query($sql);

    // Check if login is successful
    if ($result->num_rows > 0) {
        // User found, redirect to the appropriate page
        if ($userType === 'user') {
            header("Location: home.html"); // Change this to your user dashboard page
        } elseif ($userType === 'admin') {
            header("Location: admin/adminHome.php"); // Change this to your admin dashboard page
        } elseif ($userType === 'company') {
            header("Location: company/companyHome.php"); // Change this to your company dashboard page
        }
        exit(); // Make sure to exit after redirection
    } else {
        echo "<p>Incorrect username or password</p>";
    }
}

// Close connection
$conn->close();
?>
