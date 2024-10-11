<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css"> <!-- Ensure styles.css is in the same directory -->
</head>
<body>
  <section>
    <div class="animated-bg">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>

    <div class="signin">
      <div class="glass">
        <div class="content">
          <h2>Sign Up</h2>

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
              $email = $_POST['email'];
              $password = $_POST['password']; 

              // Prepare and execute the insert statement (recommended)
              $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
              
              if ($conn->query($sql) === TRUE) {
                  echo "<p>New record created successfully</p>";
              } else {
                  echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>"; 
              }
          }

          // Close connection
          $conn->close();
          ?>

          <!-- Signup form -->
          <form method="POST" action="">
            <div class="inputBox">
              <input type="text" name="username" required>
              <span>Username</span>
            </div>
            <div class="inputBox">
              <input type="email" name="email" required>
              <span>Email</span>
            </div>
            <div class="inputBox">
              <input type="password" name="password" required>
              <span>Password</span>
            </div>
            <div class="inputBox">
              <input type="submit" value="Register">
            </div>
            <div class="links">
              <a href="index.html">Already have an account? Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
