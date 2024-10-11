function compareCars() {
    const car1Select = document.getElementById('car1').value;
    const car2Select = document.getElementById('car2').value;

    // Fetch car data for car 1
    fetch(`getCarData.php?id=${car1Select}`)
        .then(response => response.json())
        .then(car1Data => {
            console.log("Car 1 Data: ", car1Data); // Debugging
            setCarDetails(car1Data, 1); // Set car 1 details
        })
        .catch(error => console.log("Error fetching car 1 data:", error));

    // Fetch car data for car 2
    fetch(`getCarData.php?id=${car2Select}`)
        .then(response => response.json())
        .then(car2Data => {
            console.log("Car 2 Data: ", car2Data); // Debugging
            setCarDetails(car2Data, 2); // Set car 2 details
        })
        .catch(error => console.log("Error fetching car 2 data:", error));

    document.getElementById('comparisonTable').style.display = 'block';
}

function setCarDetails(carData, carNumber) {
    document.getElementById(`car${carNumber}Name`).innerText = carData.name;
    document.getElementById(`car${carNumber}Image`).src = carData.image;
    document.getElementById(`car${carNumber}Price`).innerText = carData.price;
    document.getElementById(`car${carNumber}OnRoadPrice`).innerText = carData.on_road_price;
    document.getElementById(`car${carNumber}Engine`).innerText = carData.engine;
    document.getElementById(`car${carNumber}EngineType`).innerText = carData.engine_type;
    document.getElementById(`car${carNumber}Displacement`).innerText = carData.displacement;
    document.getElementById(`car${carNumber}Power`).innerText = carData.max_power;
    document.getElementById(`car${carNumber}FuelType`).innerText = carData.fuel_type;
    document.getElementById(`car${carNumber}Mileage`).innerText = carData.mileage_arai;
    document.getElementById(`car${carNumber}FuelTankCapacity`).innerText = carData.fuel_tank_capacity;
    document.getElementById(`car${carNumber}EmissionNorm`).innerText = carData.emission_norm;
    document.getElementById(`car${carNumber}Speed`).innerText = carData.top_speed;
    document.getElementById(`car${carNumber}FrontSuspension`).innerText = carData.front_suspension;
    document.getElementById(`car${carNumber}RearSuspension`).innerText = carData.rear_suspension;
    document.getElementById(`car${carNumber}SteeringType`).innerText = carData.steering_type;
    document.getElementById(`car${carNumber}FrontBrakeType`).innerText = carData.front_brake_type;
    document.getElementById(`car${carNumber}RearBrakeType`).innerText = carData.rear_brake_type;
    document.getElementById(`car${carNumber}TyreSize`).innerText = carData.tyre_size;
    document.getElementById(`car${carNumber}TyreType`).innerText = carData.tyre_type;
    document.getElementById(`car${carNumber}WheelSize`).innerText = carData.wheel_size;
    document.getElementById(`car${carNumber}AlloyWheelSizeFront`).innerText = carData.alloy_wheel_size_front;
    document.getElementById(`car${carNumber}AlloyWheelSizeRear`).innerText = carData.alloy_wheel_size_rear;
}



