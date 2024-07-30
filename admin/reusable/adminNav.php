<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info-subtle">
  <div class="container-fluid mx-5">
    <!-- Brand Logo taken from https://www.flaticon.com/free-icon/3d-car_10490228?term=car&page=3&position=67&origin=tag&related_id=10490228 and Name -->
    <a class="navbar-brand" href="index.php">
      Forza Horizon Cars Admin
    </a>
    <!-- Navbar links -->
    <?php if (isset($_SESSION['id'])) {
    ?>
      <a class="btn btn-outline-danger" href="../inc/logout.php">Logout</a>
    <?php
    }
    ?>

  </div>
</nav>