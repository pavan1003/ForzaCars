<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info-subtle">
  <div class="container-fluid mx-5">
    <!-- Brand Logo taken from https://www.flaticon.com/free-icon/3d-car_10490228?term=car&page=3&position=67&origin=tag&related_id=10490228 and Name -->
    <a class="navbar-brand" href="index.php">
      <img src="../public/logo.png" class="pe-2" alt="logo" width="50px">Forza Horizon Cars Admin
    </a>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if (isset($_SESSION['id'])) {
      ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Dashboard link -->
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>" aria-current="page" href="dashboard.php">Dashboard</a>
          </li>
          <!-- Manage cars link -->
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'listCars.php' ? 'active' : ''; ?>" aria-current="page" href="listCars.php">Manage Cars</a>
          </li>
          <!-- Add New Car link -->
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'addCar.php' ? 'active' : ''; ?>" href="addCar.php">Add New Car</a>
          </li>
          <!-- Manage drivers link -->
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'listDrivers.php' ? 'active' : ''; ?>" aria-current="page" href="listDrivers.php">Manage Drivers</a>
          </li>
          <!-- Add new driver link -->
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'addNewDriver.php' ? 'active' : ''; ?>" href="addNewDriver.php">Add New Driver</a>
          </li>
        </ul>
        <a class="btn btn-outline-danger" href="inc/logout.php">Logout</a>
      <?php
      }
      ?>
    </div>

  </div>
</nav>