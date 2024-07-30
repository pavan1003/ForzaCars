<?php
// Include the file that contains custom functions
include('functions.php');

// Check if the 'addCar' parameter is set in the POST request
if (isset($_POST['addDriver'])) {
    // Print the POST array for debugging purposes (commented out)
    // print_r($_POST);

    // Assign POST variables to corresponding PHP variables
    $driverFname = $_POST['first_name'];
    $driverLname = $_POST['last_name'];
    $age = $_POST['age'];
    $nationality = $_POST['country'];
    $experience = $_POST['experience_years'];
    $team = $_POST['team'];
    $car = $_POST['car_id'];

    // Include the database connection file
    include('../reusable/conn.php');

    // Create the SQL query to insert a new car into the database, using mysqli_real_escape_string to prevent SQL injection
    $query = "INSERT INTO drivers (`first_name`, `last_name`, `age`,`country`,`experience_years`,`team`, `car_id`) VALUES (
        '" . mysqli_real_escape_string($connect, $driverFname) . "',
        '" . mysqli_real_escape_string($connect, $driverLname) . "',
        '" . mysqli_real_escape_string($connect, $age) . "',
        '" . mysqli_real_escape_string($connect, $nationality) . "',
        '" . mysqli_real_escape_string($connect, $experience) . "',
        '" . mysqli_real_escape_string($connect, $team) . "',
        '" . mysqli_real_escape_string($connect, $car) . "')";

    // Execute the INSERT query
    $driver = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($driver) {
        // Set a success message using a custom function
        set_message('Driver was added successfully!', 'success');

        // Redirect to the main page
        header("Location: ../listDrivers.php");
    } else {
        // Print the MySQL error if the query failed
        echo "Failed: " . mysqli_error($connect);
    }
} else {
    // If the 'addCar' parameter is not set, display an error message
    echo "You should not be here!";
}