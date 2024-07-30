<?php
// Include the file that contains custom functions
include('functions.php');

// Include the database connection file
require('../reusable/conn.php');

// Check if the 'deleteDriver' parameter is set in the GET request
if (isset($_GET['deleteDriver'])) {
    // Print the GET array for debugging purposes (commented out)
    // print_r($_GET);

    // Get the 'id' parameter from the GET request and sanitize it to prevent SQL injection
    $id = $_GET['driver_id'];
    $query = "DELETE FROM drivers WHERE `driver_id` = '" . mysqli_real_escape_string($connect, $id) . "'";

    // Execute the DELETE query
    $driver = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($driver) {
        // Set a success message using a custom function
        set_message('Driver was deleted successfully!', 'danger');

        // Redirect to the main page
        header('Location: ../listDrivers.php');
    } else {
        // Print the MySQL error if the query failed
        echo mysqli_error($connect);
    }
} else {
    // If the 'deleteDriver' parameter is not set, display an error message
    echo "You should not be here!";
}