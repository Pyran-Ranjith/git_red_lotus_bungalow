<?php
/* Debug variables 
echo '<pre>';
var_dump($alert_type);
var_dump($status);
echo '</pre>';
*/
/* ********************************************* */ 
include '../includes/header.php';
include '../includes/navbar.php';
require '../config/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$status = "";
$alert_type = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO bookings 
            (customer_name,email,phone,check_in,check_out,room_type,guests,message)
            VALUES (?,?,?,?,?,?,?,?)");

        if ($stmt->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['check_in'],
            $_POST['check_out'],
            $_POST['room_type'],
            $_POST['guests'],
            $_POST['message']
        ])) {
            $_SESSION['alert_type'] = "success";
            $_SESSION['status'] = "Booking Successfully Submitted!";
        } else {
            $alert_type = "error";
            $_SESSION['status'] = "Booking Not Submitted! Something went wrong. Please try again!";
        }
    }
    // Redirect to same page (GET request)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Retrivig session variables
$status = $_SESSION['status'] ?? '';
unset($_SESSION['status']);
$alert_type = $_SESSION['alert_type'] ?? '';
unset($_SESSION['alert_type']);

$bookings = $pdo->query("SELECT * FROM bookings")->fetchAll();
?>
<?php if (isset($status)): ?>
    <!-- Bootstrap 5 Alert with Close Button -->
    <!-- Auto width based on content -->
    <?php if ($alert_type === "success") {  ?>
        <div class="alert alert-success alert-dismissible fade show d-inline-flex align-items-center" role="alert">
            <?= htmlspecialchars($status); ?>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="alert"></button>
        </div>
    <?php } else if ($alert_type === "error") { ?>
        <div class="alert alert-danger alert-dismissible fade show d-inline-flex align-items-center" role="alert">
            <?= htmlspecialchars($status); ?>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>

<?php endif; ?>

<h3>Manage Bookings</h3>

<form method="POST">
    <div>
        <input name="name" placeholder="Guest Name">
        <input name="email" placeholder="Email Address">
        <input name="phone" placeholder="Phone Number">

        <!-- <input name="check_in" placeholder="Check-in"> -->
        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Check-in</label>
        <input type="date" id="checkIn" name="check_in" required class="w-full p-4 rounded-lg bg-gray-50 text-gray-800 focus:bg-white custom-input cursor-pointer hover:bg-gray-100">

        <!-- <input name="check_out" placeholder="Check-out"> -->
        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Check-out</label>
        <input type="date" id="checkOut" name="check_out" required class="w-full p-4 rounded-lg bg-gray-50 text-gray-800 focus:bg-white custom-input cursor-pointer hover:bg-gray-100">
   </div>

    <?php echo "<br>"; ?>

    <div>
        <select id="roomSelect" name="room_type">
            <option value="Garden Suite">Garden Suite</option>
            <option value="Royal Loft">Royal Loft</option>
            <option value="Grand Villa">Grand Villa</option>
        </select>
        <i data-lucide="bed-double" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none group-focus-within:text-gold transition-colors"></i>
        <label class="floating-label group-focus-within:-translate-y-8 text-xs uppercase tracking-widest">Select Room</label>

        <select id="guests" name="guests">
            <option value="1">1 Guest</option>
            <option value="2">2 Guests</option>
            <option value="3">3 Guests</option>
            <option value="4+">4+ Guests</option>
        </select>
        <i data-lucide="users" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none group-focus-within:text-gold transition-colors"></i>
        <label class="floating-label group-focus-within:-translate-y-8 text-xs uppercase tracking-widest">Guests</label>
    </div>

    <div>
        <?php echo "<br>"; ?>

        <!-- Message Area -->
        <div class="relative group">
            <textarea id="message" name="message" rows="4" placeholder="Special Requests or Dietary Needs..." class="custom-input w-full pl-12 pr-4 py-4 rounded-lg bg-gray-50 text-gray-800 focus:bg-white resize-none"></textarea>
            <i data-lucide="message-square" class="absolute left-4 top-4 text-gray-400 pointer-events-none group-focus-within:text-gold transition-colors"></i>
            <label class="floating-label group-focus-within:-translate-y-8 text-xs uppercase tracking-widest">Requests</label>
        </div>

        <?php echo "<br>"; ?>

        <button name="add">Add Booking</button>
    </div>

</form>

<hr>

<!-- <?php foreach ($bookings as $booking): ?>
<p><?= $booking['customer_name'] ?> - $<?= $booking['email'] ?></p>
<?php endforeach; ?> -->

<!-- <hr class="my-4"> -->

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">All Bookings</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Guest</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Room</th>
                    <th>Guests</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($bookings) > 0): ?>
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
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            No bookings found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>