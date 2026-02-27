    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="navbar-brand">
                <div class="brand-icon">❖</div>
                Red Lotus Bungalow
            </a>

            <!-- Mobile Menu Icon -->
            <div class="menu-toggle" onclick="toggleMenu()">
                ☰
            </div>

            <!-- Nav Links -->
            <div class="nav-menu" id="navMenu">
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin_username'] === 'admin') { ?>
                    <a href="dashboard_front.php" class="nav-link active">Dashboard</a>
                    <a href="manage_rooms_front.php" class="nav-link">Rooms</a>
                    <a href="manage_bookings_front.php" class="nav-link">Bookings</a>
                    <a href="logout.php" class="nav-link" style="background: rgba(0,0,0,0.2);">Logout</a>
                <?php } else { ?>
                    <a href="login_front.php" class="nav-link" style="background: rgba(0,0,0,0.2);">Login</a>

                <?php } ?>
            </div>
            </div>
    </nav>