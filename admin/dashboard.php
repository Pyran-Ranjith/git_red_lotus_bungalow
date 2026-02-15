<?php
session_start();
require '../config/database.php';

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

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
