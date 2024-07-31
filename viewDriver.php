<?php
// Include the database connection file
include('admin/reusable/conn.php');

// Get the car ID from the URL parameters
$id = $_GET['id'];

// Create a SQL query to select the car details based on the provided ID
$query = "SELECT fhc.*, d.* FROM forza_horizon_cars fhc JOIN drivers d ON fhc.id = d.car_id WHERE fhc.id = '$id'";

// Execute the query and fetch the result
$driver = mysqli_query($connect, $query);
$result = $driver->fetch_assoc();
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
  ?>
  <div class="container-fluid custom-bg m-0 pb-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 my-3 bg-light rounded-5 text-center">Forza Horizon 5 Driver Details</h1>
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
      <div class="card mw-100 glassmorph p-0 rounded-5">
        <div class="row g-0">
          <div class="col-md-12 col-sm-12">
            <div class="card-body rounded-end-5">
              <h2 class="card-text"><strong>Driver Name:</strong> <?php echo $result['first_name'] . ' ' . $result['last_name']; ?></h2>
              <div class="card-text"><strong>Age:</strong> <?php echo $result['age']; ?></div>
              <div class="card-text"><strong>Country:</strong> <?php echo $result['country']; ?></div>
              <div class="card-text"><strong>Team:</strong> <?php echo $result['team']; ?></div>
              <div class="card-text"><strong>Years of Experience:</strong> <?php echo $result['experience_years']; ?></div>
              <h3 class="card-text"><strong>Current Car:</strong><?php echo $result['Name_and_model']; ?></h3>
              <div class="card-text"><strong>Car Type:</strong><?php echo $result['Model_type']; ?></div>
              <div class="card-text"><strong>Car In Game Price:</strong> <?php echo $result['In_Game_Price']; ?></div>
              <div class="card-text"><strong>Car HP:</strong> <?php echo $result['Horse_Power']; ?></div>
              <div class="card-text"><strong>Car Weight:</strong> <?php echo $result['Weight_lbs']; ?> lbs</div>
              <div class="card-text"><strong>Car Drive Type:</strong> <?php echo $result['Drive_Type']; ?></div>
              <ul class="list-unstyled mb-1">
                <li>Speed: <?php echo $result['speed']; ?>
                  <div class="progress" aria-valuenow="<?php echo $result['speed']; ?>" aria-valuemin="0" aria-valuemax="10">
                    <!-- Display speed progress bar -->
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo ($result['speed'] / 10) * 100; ?>%;"></div>
                  </div>
                </li>
                <li>Handling: <?php echo $result['handling']; ?>
                  <div class="progress" aria-valuenow="<?php echo $result['handling']; ?>" aria-valuemin="0" aria-valuemax="10">
                    <!-- Display handling progress bar -->
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo ($result['handling'] / 10) * 100; ?>%;"></div>
                  </div>
                </li>
                <li>Acceleration: <?php echo $result['acceleration']; ?>
                  <div class="progress" aria-valuenow="<?php echo $result['acceleration']; ?>" aria-valuemin="0" aria-valuemax="10">
                    <!-- Display acceleration progress bar -->
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?php echo ($result['acceleration'] / 10) * 100; ?>%;"></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>