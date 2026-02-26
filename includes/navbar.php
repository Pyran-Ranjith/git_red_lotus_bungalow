<noscript>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand"  href="dashboard.php" >Red Lotus Bungalow</a>
      <div>
        <?php if (isset($_SESSION['admin'])) { ?>
          <a class="nav-link d-inline text-white" href="manage_rooms.php">Rooms</a>
          <a class="nav-link d-inline text-white" href="manage_bookings.php">Booking</a>
          <a class="nav-link d-inline text-white" href="dashboard.php">Dashboard</a>
          <a class="nav-link d-inline text-white" href="logout.php">Logout</a>
        <?php } else { ?>
          <a class="nav-link d-inline text-white" href="logout.php">Logout</a>
        <?php } ?>
      </div>
    </div>
  </nav>
</noscript>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">

    <a class="navbar-brand fw-bold" href="index.php">
      Red Lotus Bungalow
    </a>


    <div class="ms-auto">



<?php if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!-- <?php echo $_SESSION['admin_username']; ?> -->
      <?php if (isset($_SESSION['admin']) && $_SESSION['admin_username'] === 'admin') { ?>

        <a class="nav-link d-inline text-white" href="manage_rooms.php">Rooms</a>
        <a class="nav-link d-inline text-white" href="manage_bookings.php">Booking</a>
        <a class="nav-link d-inline text-white" href="dashboard.php">Dashboard</a>
        <a class="nav-link d-inline text-white" href="logout.php">Logout</a>

      <?php } else { ?>

        <a class="nav-link d-inline text-white" href="login.php">Login</a>

      <?php } ?>

    </div>
  </div>
</nav>