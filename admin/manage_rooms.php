<?php
include '../includes/header.php';
include '../includes/navbar.php';
require '../config/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ================= DELETE ROOM ================= */
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM rooms WHERE id=?");
    $stmt->execute([$_GET['delete']]);

    $_SESSION['room_alert_type'] = "danger";
    $_SESSION['room_status'] = "Room deleted successfully!";
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

/* ================= ADD / UPDATE ROOM ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO rooms 
            (name,price,description,type,status,capacity,image)
            VALUES (?,?,?,?,?,?,?)");

        $result = $stmt->execute([
            $_POST['name'],
            $_POST['price'],
            $_POST['description'],
            $_POST['type'],
            $_POST['status'],
            $_POST['capacity'],
            $_POST['image']
        ]);

        $_SESSION['room_alert_type'] = $result ? "success" : "danger";
        $_SESSION['room_status'] = $result
            ? "Room Successfully Submitted!"
            : "Room Not Submitted! Something went wrong.";
    }

    if (isset($_POST['update'])) {
        $stmt = $pdo->prepare("UPDATE rooms SET
            name=?,
            price=?,
            description=?,
            type=?,
            status=?,
            capacity=?,
            image=?
            WHERE id=?");

        $result = $stmt->execute([
            $_POST['name'],
            $_POST['price'],
            $_POST['description'],
            $_POST['type'],
            $_POST['status'],
            $_POST['capacity'],
            $_POST['image'],
            $_POST['id']
        ]);

        $_SESSION['room_alert_type'] = $result ? "info" : "danger";
        $_SESSION['room_status'] = $result
            ? "Room Updated Successfully!"
            : "Update Failed! Please try again.";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

/* ================= FETCH EDIT DATA ================= */
$editRoom = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM rooms WHERE id=?");
    $stmt->execute([$_GET['edit']]);
    $editRoom = $stmt->fetch();
}

/* ================= SESSION ALERT ================= */
$room_status = $_SESSION['room_status'] ?? '';
$room_alert_type = $_SESSION['room_alert_type'] ?? '';
unset($_SESSION['room_status'], $_SESSION['room_alert_type']);

/* ================= FETCH ROOMS ================= */
$rooms = $pdo->query("SELECT * FROM rooms ORDER BY id DESC")->fetchAll();
?>

<div class="container my-1 px-0">

    <?php if ($room_status): ?>
        <div class="alert alert-<?= $room_alert_type ?> alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($room_status); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-lg mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= $editRoom ? 'Edit Room' : 'Manage Rooms' ?></h4>
        </div>
        <div class="card-body">
            <form method="POST" class="row g-3">
                <input type="hidden" name="id" value="<?= $editRoom['id'] ?? '' ?>">

                <div class="col-md-4">
                    <label class="form-label"><b>Name</b></label>
                    <input type="text" name="name" placeholder="name" class="form-control"
                        value="<?= $editRoom['name'] ?? '' ?>" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label"><b>Price</b></label>
                    <input type="text" name="price" placeholder="price" class="form-control"
                        value="<?= $editRoom['price'] ?? '' ?>" required>
                </div>

                <div class="col-md-5">
                    <label class="form-label"><b>Description</b></label>
                    <input type="text" name="description" placeholder="description" class="form-control"
                        value="<?= $editRoom['description'] ?? '' ?>" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label"><b>Type</b></label>
                    <input type="text" name="type" placeholder="type" class="form-control"
                        value="<?= $editRoom['type'] ?? '' ?>" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label"><b>Status</b></label>
                    <input type="text" name="status" placeholder="status" class="form-control"
                        value="<?= $editRoom['status'] ?? '' ?>" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label"><b>Capacity</b></label>
                    <input type="text" name="capacity" placeholder="capacity" class="form-control"
                        value="<?= $editRoom['capacity'] ?? '' ?>" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label"><b>Image</b></label>
                    <input type="text" name="image" placeholder="image" class="form-control"
                        value="<?= $editRoom['image'] ?? '' ?>" required>
                </div>

                <!-- <div class="col-12 text-end">
                    <?php if ($editRoom): ?>
                        <button type="submit" name="update" class="btn btn-primary">
                            Update Room
                        </button>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-secondary">
                            Cancel
                        </a>
                    <?php else: ?>
                        <button type="submit" name="add" class="btn btn-success">
                            Add
                        </button>
                    <?php endif; ?>
                </div> -->

                <div class="col-md-2">
                    <?php if ($editRoom): ?>
                        <!-- <button class="btn btn-primary w-100" name="update">Update</button> -->
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
                        <button class="btn btn-success w-100" name="add">Add</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">All Rooms</h4>
        </div>

        <div class="table-responsive">
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
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <td>
                                    <a href="?edit=<?= $room['id'] ?>"
                                        class="btn btn-sm btn-warning">Edit</a>

                                    <a href="?delete=<?= $room['id'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this room?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>