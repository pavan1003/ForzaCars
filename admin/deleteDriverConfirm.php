<?php
//Check Login
include('inc/functions.php');
secure();

// Include the database connection file
include('reusable/conn.php');

// Get the driver ID from the URL parameters
$driver_id = $_GET['driver_id'];

// Create a SQL query to select the driver details based on the provided ID
$query = "SELECT * FROM drivers WHERE driver_id = '$driver_id'";

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
      <div class="container mt-5">
        <h2>Confirm Deletion of Driver</h2>
        <p>Are you sure you want to delete the following driver?</p>
        <p><strong>Name:</strong> <?php echo $result['first_name'] . ' ' . $result['last_name']; ?></p>
        <p><strong>Age:</strong> <?php echo $result['age']; ?></p>
        <p><strong>Country:</strong> <?php echo $result['country']; ?></p>
        <p><strong>Team:</strong> <?php echo $result['team']; ?></p>
        <p><strong>Years of Experience:</strong> <?php echo $result['experience_years']; ?></p>

        <form action="deleteDriver.php" method="POST">
          <input type="hidden" name="driver_id" value="<?php echo $driver_id; ?>">
          <button type="submit" class="btn btn-danger" name="deleteDriver">Yes, Delete</button>
          <a href="viewDriver.php?id=<?php echo $result['car_id']; ?>" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>