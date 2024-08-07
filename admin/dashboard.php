<?php
// Include functions file and Check Login
include('inc/functions.php');
secure();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forza Horizon 5 Cars</title>
  <!-- Favicon for the page taken from https://www.flaticon.com/free-icon/3d-car_10490228?term=car&page=3&position=67&origin=tag&related_id=10490228-->
  <link rel="icon" href="../public/logo.png" type="image/gif">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <link rel="stylesheet" href="../public/styles.css">
</head>

<body>
  <!-- Include the navigation bar -->
  <?php include('reusable/adminNav.php'); ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 my-3 bg-light rounded-5 text-center">Dashboard</h1>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <?php
          // display messages
          get_message();
          ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <a href="listCars.php" class="text-decoration-none d-flex justify-content-center">
            <div class="card cars-card d-flex justify-content-center align-items-center">
              <div class="card-body d-flex align-items-center">
                <h2 class="card-title glassmorph text-dark display-6 p-2">Manage Cars</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
          <a href="listDrivers.php" class="w-100 text-decoration-none d-flex justify-content-center">
            <div class="card drivers-card d-flex justify-content-center align-items-center">
              <div class="card-body d-flex align-items-center">
                <h2 class="card-title glassmorph text-dark display-6 p-2">Manage Drivers</h2>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

</body>

</html>