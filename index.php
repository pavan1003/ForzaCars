<?php
// Include the database connection file
include('reusable/conn.php');
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
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <link rel="stylesheet" href="public/styles.css">
</head>

<body>
    <!-- Include the navigation bar -->
    <?php include('reusable/nav.php'); ?>
    <div class="container-fluid custom-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-4 my-3 bg-light rounded-5 text-center">All Forza Horizon 5 Cars</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php
                    // Include functions file and display any messages
                    include('inc/functions.php');
                    get_message();
                    ?>
                </div>
            </div>
            <div class="row justify-content-center align-items-center" data-masonry='{"percentPosition": true }'>
                <?php
                // Query to fetch all cars from the database
                $query = 'SELECT * FROM forza_horizon_cars';
                $cars = mysqli_query($connect, $query);

                // Loop through each car and display its details
                foreach ($cars as $car) { ?>
                    <div class="card m-2 p-0 rounded-5">
                        <div class="row g-0">
                            <div class="col-md-4 col-sm-4 d-flex align-items-center justify-content-center rounded-start-5">
                                <!-- Display the car image, replacing '/side/' with '/big/' in the URL to enhace its quality-->
                                <img src="<?php echo str_replace('/side/', '/big/', $car['Car_Image']); ?>" class="img-fluid rounded-5 ps-2" alt="Image of <?php echo $car['Name_and_model']; ?>">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="card-body rounded-end-5">
                                    <div class="card-text"><?php echo $car['Model_type']; ?></div>
                                    <h5 class="card-title"><?php echo $car['Name_and_model']; ?></h5>
                                    <div class="card-text"><strong>In Game Price:</strong> <?php echo $car['In_Game_Price']; ?></div>
                                    <div class="card-text"><strong>HP:</strong> <?php echo $car['Horse_Power']; ?></div>
                                    <div class="card-text"><strong>Weight:</strong> <?php echo $car['Weight_lbs']; ?> lbs</div>
                                    <div class="card-text">Drive Type: <?php echo $car['Drive_Type']; ?></div>
                                    <ul class="list-unstyled mb-1">
                                        <li>Speed: <?php echo $car['speed']; ?>
                                            <div class="progress" aria-valuenow="<?php echo $car['speed']; ?>" aria-valuemin="0" aria-valuemax="10">
                                                <!-- Display speed progress bar -->
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo ($car['speed'] / 10) * 100; ?>%;"></div>
                                            </div>
                                        </li>
                                        <li>Handling: <?php echo $car['handling']; ?>
                                            <div class="progress" aria-valuenow="<?php echo $car['handling']; ?>" aria-valuemin="0" aria-valuemax="10">
                                                <!-- Display handling progress bar -->
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo ($car['handling'] / 10) * 100; ?>%;"></div>
                                            </div>
                                        </li>
                                        <li>Acceleration: <?php echo $car['acceleration']; ?>
                                            <div class="progress" aria-valuenow="<?php echo $car['acceleration']; ?>" aria-valuemin="0" aria-valuemax="10">
                                                <!-- Display acceleration progress bar -->
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?php echo ($car['acceleration'] / 10) * 100; ?>%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <!-- Form to update car details -->
                                            <form action="update.php" method="GET">
                                                <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-primary" name="updateCar">
                                                    Update
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <!-- Form to delete car -->
                                            <form action="inc/deleteCar.php" method="GET">
                                                <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
                                                <button type="submit" name="deleteCar" class="btn btn-sm btn-outline-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } // End of foreach loop 
                ?>
            </div>

        </div>
    </div>

</body>

</html>