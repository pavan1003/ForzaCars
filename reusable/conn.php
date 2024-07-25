<?php
// Establish a connection to the MySQL database
$connect = mysqli_connect('localhost', 'root', '', 'Http5225Week5-0NA');

// Check if the connection was successful
if (!$connect) {
    // Display the error code if the connection failed
    echo 'Error code: ' . mysqli_connect_errno();
    // Display the error message if the connection failed
    echo 'Error message: ' . mysqli_connect_error();
    // Terminate the script if the connection failed
    exit;
}
?>
