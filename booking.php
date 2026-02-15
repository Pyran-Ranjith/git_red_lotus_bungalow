<?php
require 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $stmt = $pdo->prepare("INSERT INTO bookings 
        (customer_name,email,phone,room_id,check_in,check_out)
        VALUES (?,?,?,?,?,?)");

    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['room_id'],
        $_POST['checkin'],
        $_POST['checkout']
    ]);

    echo "<div class='alert alert-success text-center'>Booking Successful!</div>";
}
?>

<div class="container mt-4">
<form method="POST">
  <input name="name" class="form-control mb-2" placeholder="Your Name" required>
  <input name="email" class="form-control mb-2" placeholder="Email">
  <input name="phone" class="form-control mb-2" placeholder="Phone">

  <select name="room_id" class="form-control mb-2">
    <?php
    $rooms = $pdo->query("SELECT * FROM rooms");
    foreach($rooms as $room){
        echo "<option value='{$room['id']}'>{$room['name']}</option>";
    }
    ?>
  </select>

  <input type="date" name="checkin" class="form-control mb-2">
  <input type="date" name="checkout" class="form-control mb-2">

  <button class="btn btn-danger">Book Now</button>
</form>
</div>

<?php include 'includes/footer.php'; ?>
