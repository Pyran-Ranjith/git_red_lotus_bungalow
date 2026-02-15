<?php
session_start();
require '../config/database.php';

$bookings = $pdo->query("SELECT b.*, r.name AS room_name 
FROM bookings b 
JOIN rooms r ON b.room_id = r.id")->fetchAll();
?>

<h3>Manage Bookings</h3>

<?php foreach($bookings as $b): ?>
<p><?= $b['customer_name'] ?> booked <?= $b['room_name'] ?> (<?= $b['status'] ?>)</p>
<?php endforeach; ?>
