<?php
// Include the file that contains custom functions
include('functions.php');

// Check if the 'addCar' parameter is set in the POST request
if (isset($_POST['addCar'])) {
    // Print the POST array for debugging purposes (commented out)
    // print_r($_POST);

    // Assign POST variables to corresponding PHP variables
    $carNameModel = $_POST['carNameModel'];
    $modelType = $_POST['modelType'];
    $inGamePrice = $_POST['inGamePrice'];
    $horsePower = $_POST['horsePower'];
    $weight = $_POST['weight'];
    $driveType = $_POST['driveType'];
    $acceleration = $_POST['acceleration'];
    $speed = $_POST['speed'];
    $handling = $_POST['handling'];
    $imageUrl = $_POST['imageUrl'];

    // Include the database connection file
    include('../reusable/conn.php');

    // Create the SQL query to insert a new car into the database, using mysqli_real_escape_string to prevent SQL injection
    $query = "INSERT INTO forza_horizon_cars (`Name_and_model`, `Model_type`, `In_Game_Price`,`Horse_Power`,`Weight_lbs`,`Drive_Type`, `acceleration`, `speed`, `handling`,`Car_Image`) VALUES (
        '" . mysqli_real_escape_string($connect, $carNameModel) . "',
        '" . mysqli_real_escape_string($connect, $modelType) . "',
        '" . mysqli_real_escape_string($connect, $inGamePrice) . "',
        '" . mysqli_real_escape_string($connect, $horsePower) . "',
        '" . mysqli_real_escape_string($connect, $weight) . "',
        '" . mysqli_real_escape_string($connect, $driveType) . "',
        '" . mysqli_real_escape_string($connect, $acceleration) . "',
        '" . mysqli_real_escape_string($connect, $speed) . "',
        '" . mysqli_real_escape_string($connect, $handling) . "',
        '" . mysqli_real_escape_string($connect, $imageUrl) . "')";

    // Execute the INSERT query
    $car = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($car) {
        // Set a success message using a custom function
        set_message('Car was added successfully!', 'success');

        // Redirect to the main page
        header("Location: ../index.php");
    } else {
        // Print the MySQL error if the query failed
        echo "Failed: " . mysqli_error($connect);
    }
} else {
    // If the 'addCar' parameter is not set, display an error message
    echo "You should not be here!";
}
?>