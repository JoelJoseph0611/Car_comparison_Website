<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company - Add New Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2 class="form-header">Add New Car</h2>
        <form action="add_vehicle.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="on_road_price" class="form-label">On Road Price</label>
                <input type="text" class="form-control" id="on_road_price" name="on_road_price" required>
            </div>

            <div class="mb-3">
                <label for="engine" class="form-label">Engine</label>
                <input type="text" class="form-control" id="engine" name="engine" required>
            </div>

            <div class="mb-3">
                <label for="engine_type" class="form-label">Engine Type</label>
                <input type="text" class="form-control" id="engine_type" name="engine_type" required>
            </div>

            <div class="mb-3">
                <label for="displacement" class="form-label">Displacement</label>
                <input type="text" class="form-control" id="displacement" name="displacement" required>
            </div>

            <div class="mb-3">
                <label for="max_power" class="form-label">Max Power</label>
                <input type="text" class="form-control" id="max_power" name="max_power" required>
            </div>

            <div class="mb-3">
                <label for="fuel_type" class="form-label">Fuel Type</label>
                <input type="text" class="form-control" id="fuel_type" name="fuel_type" required>
            </div>

            <div class="mb-3">
                <label for="mileage_arai" class="form-label">Mileage (ARAI)</label>
                <input type="text" class="form-control" id="mileage_arai" name="mileage_arai" required>
            </div>

            <div class="mb-3">
                <label for="fuel_tank_capacity" class="form-label">Fuel Tank Capacity</label>
                <input type="text" class="form-control" id="fuel_tank_capacity" name="fuel_tank_capacity" required>
            </div>

            <div class="mb-3">
                <label for="emission_norm" class="form-label">Emission Norm</label>
                <input type="text" class="form-control" id="emission_norm" name="emission_norm" required>
            </div>

            <div class="mb-3">
                <label for="top_speed" class="form-label">Top Speed</label>
                <input type="text" class="form-control" id="top_speed" name="top_speed" required>
            </div>

            <div class="mb-3">
                <label for="front_suspension" class="form-label">Front Suspension</label>
                <textarea class="form-control" id="front_suspension" name="front_suspension" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label for="rear_suspension" class="form-label">Rear Suspension</label>
                <textarea class="form-control" id="rear_suspension" name="rear_suspension" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label for="steering_type" class="form-label">Steering Type</label>
                <input type="text" class="form-control" id="steering_type" name="steering_type" required>
            </div>

            <div class="mb-3">
                <label for="front_brake_type" class="form-label">Front Brake Type</label>
                <textarea class="form-control" id="front_brake_type" name="front_brake_type" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label for="rear_brake_type" class="form-label">Rear Brake Type</label>
                <textarea class="form-control" id="rear_brake_type" name="rear_brake_type" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label for="tyre_size" class="form-label">Tyre Size</label>
                <input type="text" class="form-control" id="tyre_size" name="tyre_size" required>
            </div>

            <div class="mb-3">
                <label for="tyre_type" class="form-label">Tyre Type</label>
                <input type="text" class="form-control" id="tyre_type" name="tyre_type" required>
            </div>

            <div class="mb-3">
                <label for="wheel_size" class="form-label">Wheel Size</label>
                <input type="text" class="form-control" id="wheel_size" name="wheel_size" required>
            </div>

            <div class="mb-3">
                <label for="alloy_wheel_size_front" class="form-label">Alloy Wheel Size (Front)</label>
                <input type="text" class="form-control" id="alloy_wheel_size_front" name="alloy_wheel_size_front" required>
            </div>

            <div class="mb-3">
                <label for="alloy_wheel_size_rear" class="form-label">Alloy Wheel Size (Rear)</label>
                <input type="text" class="form-control" id="alloy_wheel_size_rear" name="alloy_wheel_size_rear" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>

            <label for="brand">Brand:</label>
                <select id="brand" name="brand">
                    <option value="Mercedes">Mercedes</option>
                    <option value="Audi">Audi</option>
                    <option value="Tata">Tata</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="BMW">BMW</option>
                    <option value="Ford">Ford</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Honda">Honda</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Volkswagen">Volkswagen</option>
                </select><br><br>


            <button type="submit" class="btn btn-primary w-100">Add Car</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
