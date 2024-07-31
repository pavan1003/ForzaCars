<?php
// Include the database connection file
include('admin/reusable/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forza Horizon 5</title>
  <!-- Favicon for the page taken from https://www.flaticon.com/free-icon/3d-car_10490228?term=car&page=3&position=67&origin=tag&related_id=10490228-->
  <link rel="icon" href="public/logo.png" type="image/gif">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <link rel="stylesheet" href="public/styles.css">
</head>

<body>
  <?php
  // Include the navigation bar
  include('reusable/nav.php');
  // Include carFetch to get each drivers' car
  include('admin/reusable/carFetch.php');
  ?>
  <div class="container-fluid custom-bg">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 my-3 bg-light rounded-5 text-center">All Forza Horizon 5 Drivers</h1>
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
        // Query to fetch all drivers from the database
        $query = 'SELECT * FROM drivers';
        $drivers = mysqli_query($connect, $query);
        // Loop through each driver and display its details
        foreach ($drivers as $driver) { ?>
          <div class="card glassmorph m-2 p-0 rounded-5">
            <div class="row g-0">
              <div class="col-md-12 col-sm-12">
                <div class="card-body rounded-end-5">
                  <h5 class="card-title"><?php echo $driver['first_name'] . ' ' . $driver['last_name']; ?></h5>
                  <div class="card-text"><strong>Age:</strong> <?php echo $driver['age']; ?></div>
                  <div class="card-text"><strong>Country:</strong> <?php echo $driver['country']; ?></div>
                  <div class="card-text"><strong>Team:</strong> <?php echo $driver['team']; ?></div>
                  <div class="card-text"><strong>Years of Experience:</strong> <?php echo $driver['experience_years']; ?></div>
                  <div class="card-text"><strong>Current Car:</strong>
                    <?php
                    // get the correct car to display for each driver 
                    foreach ($carList as $car) {
                      if ($car['id'] == $driver['car_id']) {
                        echo $car['Name_and_model'];
                      }
                    } ?>
                  </div>
                  <?php if (isset($_SESSION['id'])) { ?>
                    <div class="row mt-3">
                      <div class="col-sm-6">
                        <!-- Form to update driver details -->
                        <form action="updateDriverData.php" method="GET">
                          <input type="hidden" name="id" value="<?php echo $driver['driver_id']; ?>">
                          <button type="submit" class="btn btn-sm btn-outline-primary" name="updateDriver">
                            Update Driver
                          </button>
                        </form>
                      </div>
                      <div class="col-sm-6 text-end">
                        <!-- Form to delete a driver -->
                        <form action="inc/deleteDriver.php" method="GET">
                          <input type="hidden" name="driver_id" value="<?php echo $driver['driver_id']; ?>">
                          <button type="submit" name="deleteDriver" class="btn btn-sm btn-outline-danger">
                            Delete Driver
                          </button>
                        </form>
                      </div>
                    </div>
                  <?php } ?>
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