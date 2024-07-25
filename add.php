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
    <!-- Include the navigation bar -->
    <?php include('reusable/nav.php'); ?>
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
            <!-- Form to add a new car -->
            <form action="inc/addCar.php" method="POST">
                <div class="row justify-content-center">
                    <!-- Car details input fields -->
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="carNameModel" class="form-label">Car Name and Model</label>
                            <input type="text" class="form-control" id="carNameModel" name="carNameModel" aria-describedby="carNameModel">
                        </div>
                        <div class="mb-3">
                            <label for="modelType" class="form-label">Model Type</label>
                            <input type="text" class="form-control" id="modelType" name="modelType">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="inGamePrice" class="form-label">In Game Price</label>
                            <input type="number" class="form-control" id="inGamePrice" name="inGamePrice">
                        </div>
                        <div class="mb-3">
                            <label for="horsePower" class="form-label">Horse Power</label>
                            <input type="number" class="form-control" id="horsePower" name="horsePower">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (lbs)</label>
                            <input type="number" class="form-control" id="weight" name="weight">
                        </div>
                        <div class="mb-3">
                            <label for="driveType" class="form-label">Drive Type</label>
                            <select class="form-select" id="driveType" name="driveType">
                                <option value="FWD">FWD</option>
                                <option value="RWD">RWD</option>
                                <option value="AWD">AWD</option>
                                <option value="4WD">4WD</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="acceleration" class="form-label">Acceleration</label>
                            <input type="number" class="form-control" id="acceleration" name="acceleration">
                        </div>
                        <div class="mb-3">
                            <label for="speed" class="form-label">Speed</label>
                            <input type="number" class="form-control" id="speed" name="speed">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="handling" class="form-label">Handling</label>
                            <input type="number" class="form-control" id="handling" name="handling">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">Image Url: </label>
                            <input type="text" class="form-control" id="imageUrl" name="imageUrl">
                        </div>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="row justify-content-center">
                    <div class="col-6 d-flex justify-content-center mb-3">
                        <button type="submit" class="btn btn-primary" name="addCar">Add Car</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>