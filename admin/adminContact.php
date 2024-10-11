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

// Fetch inquiries from the database
$sql = "SELECT id, name, email, phone, inquiry FROM inquiries ORDER BY id DESC";
$result = $conn->query($sql);

// Check for delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM inquiries WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Inquiry deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting inquiry: " . $stmt->error . "');</script>";
    }
    $stmt->close();

    // Refresh the page to see the updated list
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Inquiries</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .delete-button {
            color: white;
            background-color: #dc3545;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        @media (max-width: 600px) {
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Contact Inquiries</h2>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Inquiry</th>
            <th>Action</th> <!-- New column for actions -->
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['inquiry']); ?></td>
                    <td>
                        <a href="?delete_id=<?php echo $row['id']; ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this inquiry?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center;">No inquiries found</td>
            </tr>
        <?php endif; ?>
    </table>

    <?php
    // Close the connection
    $conn->close();
    ?>
</body>
</html>
