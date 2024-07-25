<?php
// Include the functions.php file
include('functions.php');

// Print the contents of the $_POST array (for debugging purposes)
// print_r($_POST);

// Check if the form has been submitted with the 'updateCar' button
if (isset($_POST['updateCar'])) {

    // Retrieve the form data
    $id = $_POST['id'];
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

    // Include the connection string
    include('../reusable/conn.php');

    // Construct the SQL query to update the car record
    $query = "UPDATE `forza_horizon_cars` SET 
    `Name_and_model`='" . mysqli_real_escape_string($connect, $carNameModel) . "',
    `Model_type`='" . mysqli_real_escape_string($connect, $modelType) . "',
    `In_Game_Price`='" . mysqli_real_escape_string($connect, $inGamePrice) . "',
    `Horse_Power`='" . mysqli_real_escape_string($connect, $horsePower) . "',
    `Weight_lbs`='" . mysqli_real_escape_string($connect, $weight) . "',
    `Drive_Type`='" . mysqli_real_escape_string($connect, $driveType) . "',
    `acceleration`='" . mysqli_real_escape_string($connect, $acceleration) . "',
    `speed`='" . mysqli_real_escape_string($connect, $speed) . "',
    `handling`='" . mysqli_real_escape_string($connect, $handling) . "',
    `Car_Image`='" . mysqli_real_escape_string($connect, $imageUrl) . "' WHERE 
    `id`='" . mysqli_real_escape_string($connect, $id) . "'";

    // Execute the SQL query
    $car = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($car) {
        // Set a success message
        set_message('Car was updated successfully!', 'success');
        // Redirect to the index page
        header("Location: ../index.php");
    } else {
        // Output an error message if the query failed
        echo "Failed: " . mysqli_error($connect);
    }
} else {
    // Output an error message if the form was not submitted correctly
    echo "You should not be here";
}
