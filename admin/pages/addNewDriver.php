<?php
//Check Login
include('../inc/functions.php');
secure();
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
    include('../../reusable/nav.php');
    // Include carFetch to get each drivers' car
    include('../reusable/carFetch.php');
    ?>
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h1 class="display-4 mt-5 mb-5">Add New Forza Horizon 5 Driver</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-5">
        <div class="container">
            <!-- Form to add a new driver -->
            <form action="../inc/addDriver.php" method="POST">
                <div class="row justify-content-center">
                    <!-- Driver details input fields -->
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="first_name">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="country" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="country" name="country">
                        </div>
                        <div class="mb-3">
                            <label for="experience_years" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control" id="experience_years" name="experience_years">
                        </div>
                        <div class="mb-3">
                            <label for="team" class="form-label">Current Team</label>
                            <input type="text" class="form-control" id="team" name="team">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="car_id" class="form-label">Car</label>
                            <select class="form-select" id="car_id" name="car_id">
                                <option value="X" selected disabled>-- SELECT A CAR --</option>
                                <!-- get list of cars from car table -->
                                <?php foreach ($carList as $car) : ?>
                                    <option value="<?php echo $car['id']; ?>"><?php echo $car['Name_and_model']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div class="row justify-content-center">
                        <div class="col-6 d-flex justify-content-center mb-3">
                            <button type="submit" class="btn btn-primary" name="addDriver">Add Driver</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>