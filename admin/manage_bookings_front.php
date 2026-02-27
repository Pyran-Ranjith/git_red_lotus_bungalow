<?php
ob_start();
session_start();
?>

<?php
/* ------------Process begin here ------------------------------- */
require '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Lotus Bungalow | Admin manage_bookings</title>
    <!-- Using Google Fonts for a modern typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* --- CSS Reset & Base Variables --- */
        :root {
            --primary-red: #D32F2F;
            /* Deep Red matching your brand */
            --primary-red-hover: #B71C1C;
            --accent-gold: #FFC107;
            --text-dark: #333333;
            --text-light: #666666;
            --bg-light: #F4F7F6;
            --white: #ffffff;
            --shadow-card: 0 4px 15px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.1);
            --radius: 12px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* --- Navigation Bar --- */
        .navbar {
            background-color: var(--primary-red);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            color: var(--white);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Lotus Icon Simulation */
        .brand-icon {
            width: 32px;
            height: 32px;
            background-color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
            font-size: 1.2rem;
        }

        .nav-menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--white);
        }

        .nav-link.active {
            background-color: var(--white);
            color: var(--primary-red);
            font-weight: 600;
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* --- Main Content --- */
        .main-content {
            flex: 1;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            padding: 40px 20px;
        }

        .welcome-header {
            margin-bottom: 40px;
        }

        .welcome-header h1 {
            font-size: 2rem;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .welcome-header p {
            color: var(--text-light);
        }

        /* --- Stats Cards --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--white);
            padding: 30px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-card);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 5px solid var(--primary-red);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .stat-info h3 {
            font-size: 0.9rem;
            text-transform: uppercase;
            color: var(--text-light);
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .stat-info .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background-color: #FFF0F0;
            /* Light red bg */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
        }

        .stat-icon svg {
            width: 30px;
            height: 30px;
        }

        /* --- Action Section --- */
        .actions-section {
            margin-top: 20px;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-dark);
            border-left: 4px solid var(--primary-red);
            padding-left: 15px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .action-card {
            background: var(--white);
            border-radius: var(--radius);
            padding: 25px;
            box-shadow: var(--shadow-card);
            text-decoration: none;
            color: var(--text-dark);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 20px;
            border: 1px solid transparent;
        }

        .action-card:hover {
            border-color: var(--primary-red);
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            background-color: var(--bg-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
        }

        .action-text h4 {
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .action-text p {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .btn-logout {
            background-color: #ffebee;
            color: #d32f2f;
        }

        .btn-logout:hover {
            background-color: #ffcdd2;
        }

        /* --- Footer --- */
        footer {
            background-color: #1a1a1a;
            color: #b0b0b0;
            text-align: center;
            padding: 25px 20px;
            margin-top: auto;
            font-size: 0.9rem;
            border-top: 3px solid var(--primary-red);
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .nav-menu {
                display: none;
                /* Hidden by default on mobile */
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--primary-red);
                padding: 20px;
                box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            }

            .nav-menu.active {
                display: flex;
            }

            .nav-link {
                width: 100%;
                text-align: center;
                padding: 12px;
            }

            .menu-toggle {
                display: block;
            }

            .stat-info .number {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="dashboard_front.php" class="navbar-brand">
                <div class="brand-icon">❖</div>
                Red Lotus Bungalow
            </a>

            <!-- Mobile Menu Icon -->
            <div class="menu-toggle" onclick="toggleMenu()">
                ☰
            </div>

            <!-- Nav Links -->
            <div class="nav-menu" id="navMenu">
                <?php
                /* Debug variables */
                echo '<pre>';
                // var_dump($_SESSION['user_name']);
                echo '</pre>';
                ?>
                <?php if (isset($_SESSION['admin'])) { ?>
                    <?php if ($_SESSION['user_name'] === 'admin') { ?>
                        <a href="dashboard_front.php" class="nav-link active">Dashboard</a>
                        <a href="manage_rooms_front.php" class="nav-link">Rooms</a>
                        <a href="manage_bookings_front.php" class="nav-link">Bookings</a>
                        <a href="logout.php" class="nav-link" style="background: rgba(0,0,0,0.2);">Logout</a>
                    <?php } else { ?>
                        <a href="login_front.php" class="nav-link" style="background: rgba(0,0,0,0.2);">Login</a>
                    <?php } ?>
                <?php } else { ?>
                    <a href="login_front.php" class="nav-link" style="background: rgba(0,0,0,0.2);">Login</a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">

        <div class="welcome-header">
            <h1><b>Admin Manage Bookings<b></h1>
            <p>Welcome back, Administrator booking management. </p>
        </div>

        <?php

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
                $stmt = $pdo->prepare("INSERT INTO bookings 
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
                        </div>
                    </form>
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

    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Red Lotus Bungalow. All Rights Reserved.</p>
    </footer>

    <!-- Minimal JavaScript for Mobile Menu -->
    <script>
        function toggleMenu() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('active');
        }
    </script>
</body>

</html>