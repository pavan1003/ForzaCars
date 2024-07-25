<?php
// Include the file that contains custom functions
include('functions.php');

// Include the database connection file
require('../reusable/conn.php');

// Check if the 'deleteCar' parameter is set in the GET request
if (isset($_GET['deleteCar'])) {
    // Print the GET array for debugging purposes (commented out)
    // print_r($_GET);

    // Get the 'id' parameter from the GET request and sanitize it to prevent SQL injection
    $id = $_GET['id'];
    $query = "DELETE FROM forza_horizon_cars WHERE `id` = '" . mysqli_real_escape_string($connect, $id) . "'";

    // Execute the DELETE query
    $car = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($car) {
        // Set a success message using a custom function
        set_message('Car was deleted successfully!', 'danger');

        // Redirect to the main page
        header('Location: ../index.php');
    } else {
        // Print the MySQL error if the query failed
        echo mysqli_error($connect);
    }
} else {
    // If the 'deleteCar' parameter is not set, display an error message
    echo "You should not be here!";
}

?>