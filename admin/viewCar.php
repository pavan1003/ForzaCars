<?php
// Check Login
include('inc/functions.php');
secure();

// Include the database connection file
include('reusable/conn.php');

// Get the car ID from the URL parameters
$id = $_GET['id'];

// Create a SQL query to select the car details based on the provided ID
$query = "SELECT fhc.*, d.* FROM forza_horizon_cars fhc LEFT JOIN drivers d ON fhc.id = d.car_id WHERE fhc.id = '$id'";

// Execute the query and fetch the result
$car = mysqli_query($connect, $query);
$result = $car->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forza Horizon 5</title>
  <link rel="icon" href="../public/logo.png" type="image/gif">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <link rel="stylesheet" href="../public/styles.css">
</head>

<body>
  <?php
  // Include the navigation bar
  include('reusable/adminNav.php');
  ?>
  <div class="container-fluid m-0 pb-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 my-3 bg-light rounded-5 text-center">Forza Horizon 5 Car Details</h1>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <?php
          // Display any messages
          get_message();
          ?>
        </div>
      </div>
      <div class="card mw-100 glassmorph p-0 rounded-5">
        <div class="row g-0">
          <div class="col-md-12 col-sm-12">
            <div class="card-body rounded-end-5">
              <div class="d-flex justify-content-center">
                <img src="<?php echo isset($result['Car_Image']) && $result['Car_Image'] != '' ? $result['Car_Image'] : 'default_image.png'; ?>" class="img-fluid rounded-5 ps-2" width="500px" alt="Image of <?php echo isset($result['Name_and_model']) && $result['Name_and_model'] != '' ? $result['Name_and_model'] : 'Unknown Car'; ?>">
              </div>
              <h3 class="card-text"><strong>Car Name:</strong> <?php echo isset($result['Name_and_model']) && $result['Name_and_model'] != '' ? $result['Name_and_model'] : '-'; ?></h3>
              <div class="card-text"><strong>Type:</strong> <?php echo isset($result['Model_type']) && $result['Model_type'] != '' ? $result['Model_type'] : '-'; ?></div>
              <div class="card-text"><strong>In Game Price:</strong> <?php echo isset($result['In_Game_Price']) && $result['In_Game_Price'] != '' ? $result['In_Game_Price'] : '0'; ?></div>
              <div class="card-text"><strong>HP:</strong> <?php echo isset($result['Horse_Power']) && $result['Horse_Power'] != '' ? $result['Horse_Power'] : '0'; ?></div>
              <div class="card-text"><strong>Weight:</strong> <?php echo isset($result['Weight_lbs']) && $result['Weight_lbs'] != '' ? $result['Weight_lbs'] : '0'; ?> lbs</div>
              <div class="card-text"><strong>Drive Type:</strong> <?php echo isset($result['Drive_Type']) && $result['Drive_Type'] != '' ? $result['Drive_Type'] : '-'; ?></div>
              <ul class="list-unstyled mb-1">
                <li>Speed: <?php echo isset($result['speed']) && $result['speed'] != '' ? $result['speed'] : '0'; ?>
                  <div class="progress" aria-valuenow="<?php echo isset($result['speed']) && $result['speed'] != '' ? $result['speed'] : '0'; ?>" aria-valuemin="0" aria-valuemax="10">
                    <!-- Display speed progress bar -->
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo (isset($result['speed']) && $result['speed'] != '' ? $result['speed'] / 10 : 0) * 100; ?>%;"></div>
                  </div>
                </li>
                <li>Handling: <?php echo isset($result['handling']) && $result['handling'] != '' ? $result['handling'] : '0'; ?>
                  <div class="progress" aria-valuenow="<?php echo isset($result['handling']) && $result['handling'] != '' ? $result['handling'] : '0'; ?>" aria-valuemin="0" aria-valuemax="10">
                    <!-- Display handling progress bar -->
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo (isset($result['handling']) && $result['handling'] != '' ? $result['handling'] / 10 : 0) * 100; ?>%;"></div>
                  </div>
                </li>
                <li>Acceleration: <?php echo isset($result['acceleration']) && $result['acceleration'] != '' ? $result['acceleration'] : '0'; ?>
                  <div class="progress" aria-valuenow="<?php echo isset($result['acceleration']) && $result['acceleration'] != '' ? $result['acceleration'] : '0'; ?>" aria-valuemin="0" aria-valuemax="10">
                    <!-- Display acceleration progress bar -->
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?php echo (isset($result['acceleration']) && $result['acceleration'] != '' ? $result['acceleration'] / 10 : 0) * 100; ?>%;"></div>
                  </div>
                </li>
              </ul>
              <?php if ($result['first_name']) { ?>
                <h2 class="card-text"><strong>Car Driver's Name:</strong> <?php echo isset($result['first_name']) && $result['first_name'] != '' ? $result['first_name'] : '-';
                                                                          echo ' ' . (isset($result['last_name']) && $result['last_name'] != '' ? $result['last_name'] : '-'); ?></h2>
                <div class="card-text"><strong>Driver's Age:</strong> <?php echo isset($result['age']) && $result['age'] != '' ? $result['age'] : '0'; ?></div>
                <div class="card-text"><strong>Driver's Country:</strong> <?php echo isset($result['country']) && $result['country'] != '' ? $result['country'] : '-'; ?></div>
                <div class="card-text"><strong>Driver's Team:</strong> <?php echo isset($result['team']) && $result['team'] != '' ? $result['team'] : '-'; ?></div>
                <div class="card-text"><strong>Driver's Years of Experience:</strong> <?php echo isset($result['experience_years']) && $result['experience_years'] != '' ? $result['experience_years'] : '0'; ?></div>
              <?php } else { ?>
                <div class="card-text text-danger"><strong>No driver information available for this car.</strong></div>
              <?php } ?>

              <?php if (isset($_SESSION['id'])) { ?>
                <div class="row mt-3">
                  <div class="col-sm-3">
                    <form action="updateCar.php" method="GET">
                      <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                      <button type="submit" class="btn btn-sm btn-outline-primary" name="updateCar">Update Car Details</button>
                    </form>
                  </div>
                  <?php if ($result['first_name']) { ?>
                    <div class="col-sm-3">
                      <form action="updateDriver.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $result['driver_id']; ?>">
                        <button type="submit" class="btn btn-sm btn-outline-primary" name="updateDriver">Update Driver Details</button>
                      </form>
                    </div>
                    <div class="col-sm-3 text-end">
                      <form action="deleteDriverConfirm.php" method="GET">
                        <input type="hidden" name="driver_id" value="<?php echo $result['driver_id']; ?>">
                        <button type="submit" name="deleteDriver" class="btn btn-sm btn-outline-danger">Delete Driver</button>
                      </form>
                    </div>
                  <?php } ?>
                  <div class="col-sm-3 text-end">
                    <form action="deleteCarConfirm.php" method="GET">
                      <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                      <button type="submit" name="deleteCar" class="btn btn-sm btn-outline-danger">Delete Car</button>
                    </form>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>