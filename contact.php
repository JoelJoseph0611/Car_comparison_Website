<?php
// Database configuration
$servername = "localhost"; // Database server
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "cars";          // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize message variable
$message = "";

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $inquiry = $_POST["inquiry"];
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO inquiries (name, email, phone, inquiry) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $inquiry);
    
    // Execute the statement
    if ($stmt->execute()) {
        $message = "<p class='success'>Inquiry submitted successfully!</p>";
    } else {
        $message = "<p class='error'>Error: " . $stmt->error . "</p>"; // This will show any errors from the insert
    }
    
    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        #contact {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success, .error {
            text-align: center;
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
        }

        .success {
            color: green;
            background-color: #d4edda; /* Light green background */
        }

        .error {
            color: red;
            background-color: #f8d7da; /* Light red background */
        }

        @media (max-width: 480px) {
            #contact {
                width: 90%;
            }
        }
    </style>
</head>
<body>
   <!-- Contact Us -->
   <section id="contact">
    <h2>Contact Us</h2>
    <?php echo $message; // Display message here ?>
    <form name="contactus" method="post" action="">
        <label for="name">Name*</label>
        <input type="text" name="name" placeholder="Name" required>

        <label for="email">Email*</label>
        <input type="email" name="email" placeholder="Email Address" required>

        <label for="phone">Phone</label>
        <input type="text" name="phone" placeholder="Phone Number">

        <label for="inquiry">Inquiry*</label>
        <textarea name="inquiry" placeholder="Enter Your Inquiry Here" required></textarea>

        <input type="submit" value="Submit" />
    </form>
    </section>
</body>
</html>
