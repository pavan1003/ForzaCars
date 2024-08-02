<?php
// Include the functions.php file
include('functions.php');
secure();
// Print the contents of the $_POST array (for debugging purposes)
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// print_r("SESSION:" . $_SESSION['id']);

if (isset($_POST['updateCar']) && isset($_SESSION['id'])) {
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
    $video_id = $_POST['video_id'];

    // Handle Car Sound upload
    include('../reusable/conn.php');

    // Fetch the existing car record
    $query = "SELECT `Car_Sound` FROM `forza_horizon_cars` WHERE `id`='" . mysqli_real_escape_string($connect, $id) . "'";
    $result = mysqli_query($connect, $query);
    $existingCar = mysqli_fetch_assoc($result);

    // Set the initial car sound path to the existing path
    $carSoundPath = $existingCar['Car_Sound'];
    if (isset($_FILES['carSound']) && $_FILES['carSound']['error'] === 0 && $_FILES['carSound']['name'] !== '') {
        $uploadDir = '../../uploads/car_sounds/'; // Directory where the audio files will be stored
        $fileName = basename($_FILES['carSound']['name']);
        $uploadFilePath = $uploadDir . $fileName;
        echo "HERE";
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES['carSound']['tmp_name'], $uploadFilePath)) {
            $carSoundPath = $fileName; // Save the path to store in the database
        } else {
            echo "Failed to upload car sound file.";
        }
    }

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
        `Car_Image`='" . mysqli_real_escape_string($connect, $imageUrl) . "',
        `video_id`='" . mysqli_real_escape_string($connect, $video_id) . "',
        `Car_Sound`='" . mysqli_real_escape_string($connect, $carSoundPath) . "' 
        WHERE `id`='" . mysqli_real_escape_string($connect, $id) . "'";

    // Execute the SQL query
    $car = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($car) {
        // Set a success message
        set_message('Car was updated successfully!', 'success');
        // Redirect to the index page
        header("Location: ../listCars.php");
    } else {
        // Output an error message if the query failed
        echo "Failed: " . mysqli_error($connect);
    }
} else {
    // Output an error message if the form was not submitted correctly
    echo "You should not be here";
}
