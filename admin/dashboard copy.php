<?php
include '../includes/header.php';
include '../includes/navbar.php';
include '../includes/load.php';
/* ------------Process begin here ------------------------------- */
require '../config/database.php';

$totalRooms = $pdo->query("SELECT COUNT(*) FROM rooms")->fetchColumn();
$totalBookings = $pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();
?>

<div class="container mt-5">
<h2>Admin Dashboard</h2>
<p>Total Rooms: <?= $totalRooms ?></p>
<p>Total Bookings: <?= $totalBookings ?></p>
<a href="manage_rooms.php">Manage Rooms</a><br>
<a href="manage_bookings.php">Manage Bookings</a><br>
<a href="logout.php">Logout</a>
</div>

<?php include '../includes/footer.php'; ?>
