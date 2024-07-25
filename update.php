<?php
// Include the database connection file
include('reusable/conn.php');

// Get the car ID from the URL parameters
$id = $_GET['id'];

// Create a SQL query to select the car details based on the provided ID
$query = "SELECT * FROM forza_horizon_cars WHERE `id` = '$id'";

// Execute the query and fetch the result
$car = mysqli_query($connect, $query);
$result = $car->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forza Horizon 5 Cars</title>
    <!-- Favicon for the page taken from https://www.flaticon.com/free-icon/3d-car_10490228?term=car&page=3&position=67&origin=tag&related_id=10490228-->
    <link rel="icon" href="public/logo.png" type="image/gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    // Include the navigation bar
    include('reusable/nav.php');
    ?>
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h1 class="display-4 mt-5 mb-5">Add New Forza Horizon 5 Car</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="container">
            <!-- Form to update car details -->
            <form action="inc/updateCar.php" method="POST">
                <!-- Hidden input to store car ID -->
                <input type="hidden" value="<?php echo $id ?>" name="id">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="carNameModel" class="form-label">Car Name and Model</label>
                            <input type="text" class="form-control" id="carNameModel" name="carNameModel" value="<?php echo $result['Name_and_model'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="modelType" class="form-label">Model Type</label>
                            <input type="text" class="form-control" id="modelType" name="modelType" value="<?php echo $result['Model_type'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="inGamePrice" class="form-label">In Game Price</label>
                            <input type="text" class="form-control" id="inGamePrice" name="inGamePrice" value="<?php echo $result['In_Game_Price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="horsePower" class="form-label">Horse Power</label>
                            <input type="number" class="form-control" id="horsePower" name="horsePower" value="<?php echo $result['Horse_Power'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (lbs)</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $result['Weight_lbs'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="driveType" class="form-label">Drive Type</label>
                            <select class="form-select" id="driveType" name="driveType">
                                <option value="FWD" <?php if ($result['Drive_Type'] == 'FWD') echo 'selected'; ?>>FWD</option>
                                <option value="RWD" <?php if ($result['Drive_Type'] == 'RWD') echo 'selected'; ?>>RWD</option>
                                <option value="AWD" <?php if ($result['Drive_Type'] == 'AWD') echo 'selected'; ?>>AWD</option>
                                <option value="4WD" <?php if ($result['Drive_Type'] == '4WD') echo 'selected'; ?>>4WD</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="acceleration" class="form-label">Acceleration</label>
                            <input type="number" class="form-control" id="acceleration" step="any" name="acceleration" value="<?php echo $result['acceleration'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="speed" class="form-label">Speed</label>
                            <input type="number" class="form-control" id="speed" step="any" name="speed" value="<?php echo $result['speed'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="handling" class="form-label">Handling</label>
                            <input type="number" class="form-control" id="handling" step="any" name="handling" value="<?php echo $result['handling'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">Image Url: </label>
                            <input type="text" class="form-control" id="imageUrl" name="imageUrl" value="<?php echo $result['Car_Image'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 d-flex justify-content-center mb-3">
                        <button type="submit" class="btn btn-primary" name="updateCar">Update Car</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>