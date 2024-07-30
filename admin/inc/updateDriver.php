<?php
// Include the functions.php file
include('functions.php');

// Print the contents of the $_POST array (for debugging purposes)
// print_r($_POST);

// Check if the form has been submitted with the 'updateDriver' button
if (isset($_POST['updateDriver'])) {

    // Retrieve the form data
    $id = $_POST['id'];
    $driverFname = $_POST['first_name'];
    $driverLname = $_POST['last_name'];
    $age = $_POST['age'];
    $nationality = $_POST['country'];
    $experience = $_POST['experience_years'];
    $team = $_POST['team'];
    $car = $_POST['car_id'];

    // Include the connection string
    include('../reusable/conn.php');

    // Construct the SQL query to update the driver record
    $query = "UPDATE `drivers` SET 
    `first_name`='" . mysqli_real_escape_string($connect, $driverFname) . "',
    `last_name`='" . mysqli_real_escape_string($connect, $driverLname) . "',
    `age`='" . mysqli_real_escape_string($connect, $age) . "',
    `country`='" . mysqli_real_escape_string($connect, $nationality) . "',
    `experience_years`='" . mysqli_real_escape_string($connect, $experience) . "',
    `team`='" . mysqli_real_escape_string($connect, $team) . "',
    `car_id`='" . mysqli_real_escape_string($connect, $car) . "'
     WHERE 
    `driver_id`='" . mysqli_real_escape_string($connect, $id) . "'";

    // Execute the SQL query
    $driver = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($driver) {
        // Set a success message
        set_message('Driver was updated successfully!', 'success');
        // Redirect to the index page
        header("Location: ../listDrivers.php");
    } else {
        // Output an error message if the query failed
        echo "Failed: " . mysqli_error($connect);
    }
} else {
    // Output an error message if the form was not submitted correctly
    echo "You should not be here";
}
