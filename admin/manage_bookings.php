<?php
include '../includes/header.php';
include '../includes/navbar.php';
require '../config/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ================= DELETE ================= */
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM bookings WHERE id=?");
    $stmt->execute([$_GET['delete']]);

    $_SESSION['alert_type'] = "danger";
    $_SESSION['status'] = "Booking deleted successfully!";
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

/* ================= ADD / UPDATE ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['add'])) {

        $stmt = $pdo->prepare("INSERT INTO bookings 
            (customer_name,email,phone,check_in,check_out,room_type,guests,message)
            VALUES (?,?,?,?,?,?,?,?)");

        $result = $stmt->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['check_in'],
            $_POST['check_out'],
            $_POST['room_type'],
            $_POST['guests'],
            $_POST['message']
        ]);

        $_SESSION['alert_type'] = $result ? "success" : "danger";
        $_SESSION['status'] = $result
            ? "Booking Successfully Submitted!"
            : "Booking Not Submitted! Something went wrong.";
    }

    if (isset($_POST['update'])) {

        $stmt = $pdo->prepare("UPDATE bookings SET
            customer_name=?,
            email=?,
            phone=?,
            check_in=?,
            check_out=?,
            room_type=?,
            guests=?,
            message=?
            WHERE id=?");

        $result = $stmt->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['check_in'],
            $_POST['check_out'],
            $_POST['room_type'],
            $_POST['guests'],
            $_POST['message'],
            $_POST['id']
        ]);

        $_SESSION['alert_type'] = $result ? "info" : "danger";
        $_SESSION['status'] = $result
            ? "Booking Updated Successfully!"
            : "Update Failed! Please try again.";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

/* ================= FETCH EDIT DATA ================= */
$editBooking = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM bookings WHERE id=?");
    $stmt->execute([$_GET['edit']]);
    $editBooking = $stmt->fetch();
}

/* ================= SESSION ALERT ================= */
$status = $_SESSION['status'] ?? '';
$alert_type = $_SESSION['alert_type'] ?? '';
unset($_SESSION['status'], $_SESSION['alert_type']);

/* ================= FETCH ALL BOOKINGS ================= */
$bookings = $pdo->query("SELECT * FROM bookings ORDER BY id DESC")->fetchAll();
?>

<!-- <div class="container my-5 px-4"> -->
<div class="container my-1 px-0">
    <?php if ($status): ?>
        <div class="alert alert-<?= $alert_type ?> alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($status) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-lg mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= $editBooking ? 'Edit Bookings' : 'Manage Bookings' ?></h4>
        </div>
        <div class="card-body">
            <form method="POST" class="row g-3 mb-4">
                <input type="hidden" name="id" value="<?= $editBooking['id'] ?? '' ?>">

                <div class="col-md-3">
                    <!-- <input class="form-control" name="name" placeholder="Guest Name"
                        value="<?= $editBooking['customer_name'] ?? '' ?>" required> -->
                    <label class="form-label"><b>Name</b></label>
                    <input type="text" name="name" placeholder="Name" class="form-control"
                        value="<?= $editBooking['customer_name'] ?? '' ?>" required>
                </div>

                <div class="col-md-3">
                    <!-- <input class="form-control" name="email" placeholder="Email"
                        value="<?= $editBooking['email'] ?? '' ?>" required> -->
                    <label class="form-label"><b>Email</b></label>
                    <input type="text" name="email" placeholder="email" class="form-control"
                        value="<?= $editBooking['email'] ?? '' ?>" required>
                </div>

                <div class="col-md-2">
                    <!-- <input class="form-control" name="phone" placeholder="Phone" -->
                    <label class="form-label"><b>Phone</b></label>
                    <input type="text" name="phone" placeholder="phone" class="form-control"
                        value="<?= $editBooking['phone'] ?? '' ?>" required>
                </div>

                <div class="col-md-2">
                    <!-- <input type="date" class="form-control" name="check_in"
                        value="<?= $editBooking['check_in'] ?? '' ?>" required> -->
                    <label class="form-label"><b>Check_in</b></label>
                    <input type="date" name="check_in" placeholder="check_in" class="form-control"
                        value="<?= $editBooking['check_in'] ?? '' ?>" required>
                </div>

                <div class="col-md-2">
                    <!-- <input type="date" class="form-control" name="check_out"
                        value="<?= $editBooking['check_out'] ?? '' ?>" required> -->
                    <label class="form-label"><b>Check_out</b></label>
                    <input type="date" name="check_in" placeholder="check_out" class="form-control"
                        value="<?= $editBooking['check_out'] ?? '' ?>" required>
                </div>

                <div class="col-md-2">
                    <!-- <input class="form-control" name="room_type" placeholder="Room"
                        value="<?= $editBooking['room_type'] ?? '' ?>" required> -->
                    <label class="form-label"><b>Type</b></label>
                    <input type="text" name="room_type" placeholder="type" class="form-control"
                        value="<?= $editBooking['room_type'] ?? '' ?>" required>
                </div>

                <div class="col-md-2">
                    <!-- <input class="form-control" name="guests" placeholder="Guests"
                        value="<?= $editBooking['guests'] ?? '' ?>" required> -->
                    <label class="form-label"><b>Guests</b></label>
                    <input type="text" name="guests" placeholder="guests" class="form-control"
                        value="<?= $editBooking['guests'] ?? '' ?>" required>
                </div>

                <div class="col-md-4">
                    <!-- <input class="form-control" name="message" placeholder="Message"
                        value="<?= $editBooking['message'] ?? '' ?>"> -->
                    <label class="form-label"><b>Message</b></label>
                    <input type="text" name="message" placeholder="message" class="form-control"
                        value="<?= $editBooking['message'] ?? '' ?>" required>
                </div>

<div class="col-md-3">
    <?php if ($editBooking): ?>
        <div class="d-flex gap-2">
            <button class="btn btn-warning flex-fill" name="update">
                Update
            </button>

            <a href="<?= $_SERVER['PHP_SELF'] ?>" 
               class="btn btn-secondary flex-fill">
                Cancel
            </a>
        </div>
    <?php else: ?>
        <button class="btn btn-success w-100" name="add">
            Add
        </button>
    <?php endif; ?>
</div>            </form>
        </div>
    </div>

    <hr>

    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">All Bookings</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Guest</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>Guests</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Message</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $index => $booking): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($booking['customer_name']) ?></td>
                            <td><?= htmlspecialchars($booking['email']) ?></td>
                            <td><?= htmlspecialchars($booking['phone']) ?></td>
                            <td><?= htmlspecialchars($booking['room_type']) ?></td>
                            <td><?= htmlspecialchars($booking['guests']) ?></td>
                            <td><?= htmlspecialchars($booking['check_in']) ?></td>
                            <td><?= htmlspecialchars($booking['check_out']) ?></td>
                            <td><?= htmlspecialchars($booking['message']) ?></td>
                            <td>
                                <a href="?edit=<?= $booking['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="?delete=<?= $booking['id'] ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this booking?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div> <!-- End Container -->
<?php include '../includes/footer.php'; ?>