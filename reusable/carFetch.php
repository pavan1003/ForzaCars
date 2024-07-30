<?php 
include('conn.php');
// Fetch car names from the cars table
$carQuery = "SELECT id, Name_and_model FROM forza_horizon_cars";
$carResult = mysqli_query($connect, $carQuery);

// Check if the car query was successful
if (!$carResult) {
    die("Car fetch was unsuccessful: " . mysqli_error($connect));
}

// Array to store the car names and make it available for the user to use it as an input
$carList = [];
while ($row = mysqli_fetch_assoc($carResult)) {
    $carList[] = $row;
}