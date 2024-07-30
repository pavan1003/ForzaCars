<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info-subtle">
    <div class="container-fluid mx-5">
        <!-- Brand Logo taken from https://www.flaticon.com/free-icon/3d-car_10490228?term=car&page=3&position=67&origin=tag&related_id=10490228 and Name -->
        <a class="navbar-brand" href="index.php">
            <img src="public/logo.png" class="pe-2" alt="logo" width="50px">Forza Horizon Cars
        </a>
        <!-- Toggler button for collapsing navbar content on small screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Home link -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Cars</a>
                </li>
                <!-- Drivers link -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="listDrivers.php">Drivers</a>
                </li>
                <!-- Add New Car link -->
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Add New Car</a>
                </li>
                <!-- Add new driver link -->
                <li class="nav-item">
                    <a class="nav-link" href="addNewDriver.php">Add New Driver</a>
                </li>
            </ul>
        </div>
    </div>
</nav>