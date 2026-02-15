<?php
require 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

$stmt = $pdo->query("SELECT * FROM rooms");
$rooms = $stmt->fetchAll();
?>

<div class="container mt-4">
  <div class="row">
    <?php foreach($rooms as $room): ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <h5><?= $room['name'] ?></h5>
            <p><?= $room['description'] ?></p>
            <p><strong>$<?= $room['price'] ?></strong></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
