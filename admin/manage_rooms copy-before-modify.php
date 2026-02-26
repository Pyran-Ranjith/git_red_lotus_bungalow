<?php
include '../includes/header.php';
include '../includes/navbar.php';
require '../config/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$room_status = "";
$room_alert_type = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO rooms (name,price,description,type,status,capacity,image)
                           VALUES (?,?,?,?,?,?,?)");
        if ($stmt->execute([
            $_POST['name'],
            $_POST['price'],
            $_POST['description'],
            $_POST['type'],
            $_POST['status'],
            $_POST['capacity'],
            $_POST['image']
        ])) {
            $_SESSION['room_alert_type'] = "success";
            $_SESSION['room_status'] = "Room Successfully Submitted!";
        } else {
            $room_alert_type = "error";
            $_SESSION['room_status'] = "Room Not Submitted! Something went wrong. Please try again!";
        }
    }
    // Redirect to same page (GET request)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
// Retrivig session variables
$room_status = $_SESSION['room_status'] ?? '';
unset($_SESSION['room_status']);
$room_alert_type = $_SESSION['room_alert_type'] ?? '';
unset($_SESSION['room_alert_type']);

$rooms = $pdo->query("SELECT * FROM rooms")->fetchAll();
?>
<?php if (isset($room_status)): ?>
    <!-- Bootstrap 5 Alert with Close Button -->
    <!-- Auto width based on content -->
    <?php if ($room_alert_type === "success") {  ?>
        <div class="alert alert-success alert-dismissible fade show d-inline-flex align-items-center" role="alert">
            <?= htmlspecialchars($room_status); ?>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="alert"></button>
        </div>
    <?php } else if ($room_alert_type === "error") { ?>
        <div class="alert alert-danger alert-dismissible fade show d-inline-flex align-items-center" role="alert">
            <?= htmlspecialchars($room_status); ?>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>

<?php endif; ?>

<h3>Manage Rooms</h3>

<form method="POST">
    <input name="name" placeholder="Name">
    <input name="price" placeholder="Price">
    <input name="description" placeholder="Description">
    <input name="type" placeholder="Type">
    <input name="status" placeholder="Status">
    <input name="capacity" placeholder="Capacity">
    <input name="image" placeholder="Image">
    <button name="add">Add Room</button>
</form>

<hr class="my-4">

<noscrpipt>
    <!-- None formatted output -->
    <?php foreach ($rooms as $room): ?>
        <!-- <p><?= $room['name'] ?> - $<?= $room['price'] ?> - $<?= $room['description'] ?> - $<?= $room['type'] ?> - $<?= $room['capacity'] ?> - $<?= $room['image'] ?> - $<?= $room['price'] ?></p> -->
    <?php endforeach; ?>
</noscrpipt>


<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">All Rooms</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Capacity</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($rooms) > 0): ?>
                    <?php foreach ($rooms as $index => $room): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($room['name']) ?></td>
                            <td><?= htmlspecialchars($room['price']) ?></td>
                            <td><?= htmlspecialchars($room['description']) ?></td>
                            <td><?= htmlspecialchars($room['type']) ?></td>
                            <td><?= htmlspecialchars($room['status']) ?></td>
                            <td><?= htmlspecialchars($room['capacity']) ?></td>
                            <td><?= htmlspecialchars($room['image']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            No room found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>