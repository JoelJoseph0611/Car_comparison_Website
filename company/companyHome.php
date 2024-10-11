<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard - Car Compare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background-color: #f4f4f4; /* Light grey background */
            font-family: 'Arial', sans-serif; /* Changed font for better readability */
        }
        .navbar {
            background-color: #007bff; /* Blue navbar */
        }
        .navbar .nav-link {
            color: #fff; /* White text for navbar links */
        }
        .banner {
            background: url('image2.png') no-repeat center center/cover;
            height: 70vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 0 0 20px 20px; /* Rounded bottom corners */
            margin-bottom: 20px; /* Space below banner */
        }
        .banner h1 {
            font-size: 3rem; /* Larger font for title */
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Shadow for text readability */
        }
        .banner p {
            font-size: 1.25rem; /* Medium font for description */
            opacity: 0.9; /* Slight transparency for better overlay effect */
        }
        .card {
            border: none; /* No border for cards */
            border-radius: 10px; /* Rounded corners */
            transition: transform 0.3s, box-shadow 0.3s; /* Smooth hover effect */
            background: #ffffff; /* White background for cards */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); /* Enhanced shadow on hover */
        }
        .footer {
            background-color: #343a40; /* Dark footer */
            color: white; /* White text for footer */
            padding: 20px;
            text-align: center;
            margin-top: 20px; /* Space above footer */
        }
        .card-title {
            font-size: 1.5rem; /* Larger card title font */
            color: #007bff; /* Blue color for titles */
        }
        .card-text {
            font-size: 1rem; /* Font size for card text */
            color: #666; /* Darker grey for better readability */
        }
        .btn-primary {
            background-color: #007bff; /* Primary button color */
            border-color: #007bff; /* Primary button border color */
            transition: background-color 0.3s, border-color 0.3s; /* Smooth transition for buttons */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #004085; /* Darker blue border on hover */
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Car Compare</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editCar.php">Add New Car</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#manage-cars">Manage Cars</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="banner">
    <div>
        <h1>Welcome to Your Dashboard</h1>
        <p>Manage your cars and make updates seamlessly.</p>
    </div>
</div>

<main class="container my-5">
    <h2 class="text-center">Quick Actions</h2>
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card text-center p-4 shadow">
                <h3 class="card-title">Add New Car</h3>
                <p class="card-text">Add details of new cars to your inventory.</p>
                <a href="companyAddCars.php" class="btn btn-primary">Add Car</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center p-4 shadow">
                <h3 class="card-title">Manage Cars</h3>
                <p class="card-text">View and edit your existing car listings.</p>
                <a href="manage_cars.php" class="btn btn-warning">Manage</a>
            </div>
        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybW9W9DkA2kOs8n7yJ5+ucTqtg7g3ynUYGsnV2NtwZ62uRvLJ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-4W8xnS2yikTwtoV+50b5RSvZZU58zRXqvBQbOVD1+QaIwTKyn9DYoRVyxFb3Lfxs" crossorigin="anonymous"></script>
</body>
</html>
