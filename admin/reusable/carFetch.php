<?php
include('conn.php');
// Fetch cars from the cars table
$query = 'SELECT * FROM forza_horizon_cars';
$cars = mysqli_query($connect, $query);

// Check if the car query was successful
if (!$cars) {
    die("Fetching cars was unsuccessful: " . mysqli_error($connect));
}

// Array to store the cars
$carList = [];
while ($row = mysqli_fetch_assoc($cars)) {
    $carList[] = $row;
}
