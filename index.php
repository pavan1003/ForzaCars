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
                    include('admin/inc/functions.php');
                    get_message();
                    ?>
                </div>
            </div>
            <div class="row justify-content-center align-items-center" data-masonry='{"percentPosition": true }'>
                <?php
                // Query to fetch all cars from the database
                include('admin/reusable/carFetch.php');

                // Loop through each car and display its details
                foreach ($carList as $car) { ?>
                    <div class="card glassmorph m-2 p-0 rounded-5">
                        <div class="row g-0">
                            <div class="col-md-4 col-sm-4 d-flex align-items-center justify-content-center rounded-start-5">
                                <!-- Display the car image, replacing '/side/' with '/big/' in the URL to enhance its quality-->
                                <img src="<?php echo isset($car['Car_Image']) && $car['Car_Image'] != '' ? $car['Car_Image'] : 'https://placehold.co/600x400'; ?>" class="img-fluid rounded-5 ps-2" alt="Image of <?php echo isset($car['Name_and_model']) ? $car['Name_and_model'] : 'Unknown Car'; ?>">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="card-body rounded-end-5">
                                    <div class="card-text"><?php echo isset($car['Model_type']) && $car['Model_type'] != '' ? $car['Model_type'] : '-'; ?></div>
                                    <h5 class="card-title"><?php echo isset($car['Name_and_model']) && $car['Name_and_model'] != '' ? $car['Name_and_model'] : '-'; ?></h5>
                                    <div class="card-text"><strong>In Game Price:</strong> <?php echo isset($car['In_Game_Price']) && $car['In_Game_Price'] != '' ? $car['In_Game_Price'] : '-'; ?></div>
                                    <div class="card-text"><strong>HP:</strong> <?php echo isset($car['Horse_Power']) && $car['Horse_Power'] != '' ? $car['Horse_Power'] : '-'; ?></div>
                                    <div class="card-text"><strong>Weight:</strong> <?php echo isset($car['Weight_lbs']) && $car['Weight_lbs'] != '' ? $car['Weight_lbs'] : 0; ?> lbs</div>
                                    <div class="card-text">Drive Type: <?php echo isset($car['Drive_Type']) && $car['Drive_Type'] != '' ? $car['Drive_Type'] : '-'; ?></div>
                                    <ul class="list-unstyled mb-1">
                                        <li>Speed: <?php echo isset($car['speed']) && $car['speed'] != ''  ? $car['speed'] : '0'; ?>
                                            <div class="progress" aria-valuenow="<?php echo isset($car['speed']) && $car['speed'] != '' ? $car['speed'] : '0'; ?>" aria-valuemin="0" aria-valuemax="10">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo (isset($car['speed']) && $car['speed'] != '' ? $car['speed'] : '0') * 10; ?>%;"></div>
                                            </div>
                                        </li>
                                        <li>Handling: <?php echo isset($car['handling']) && $car['handling'] != '' ? $car['handling'] : '0'; ?>
                                            <div class="progress" aria-valuenow="<?php echo isset($car['handling']) && $car['handling'] != '' ? $car['handling'] : '0'; ?>" aria-valuemin="0" aria-valuemax="10">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo (isset($car['handling']) && $car['handling'] != '' ? $car['handling'] : '0') * 10; ?>%;"></div>
                                            </div>
                                        </li>
                                        <li>Acceleration: <?php echo isset($car['acceleration']) && $car['acceleration'] != '' ? $car['acceleration'] : '0'; ?>
                                            <div class="progress" aria-valuenow="<?php echo isset($car['acceleration']) && $car['acceleration'] != '' ? $car['acceleration'] : '0'; ?>" aria-valuemin="0" aria-valuemax="10">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?php echo (isset($car['acceleration']) && $car['acceleration'] != '' ? $car['acceleration'] : '0') * 10; ?>%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            <!-- Form to view car details -->
                                            <form action="viewCar.php" method="GET">
                                                <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-info" name="viewCar">
                                                    View
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