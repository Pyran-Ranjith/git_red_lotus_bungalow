<?php
// MUST be the very first line
include '../includes/load.php';   // session_start + auth check

include '../includes/header_front.php';
include '../includes/navbar_front.php';
?>

<!-- Main Content -->
<main class="main-content">

    <div class="welcome-header">
        <h1>Admin Dashboard</h1>
        <p>Welcome back, Administrator. Here is today's overview.</p>
    </div>

    <!-- Stats Section -->
    <section class="stats-grid">
        <!-- Total Rooms Card -->
        <div class="stat-card">
            <div class="stat-info">
                <h3>Total Rooms</h3>
                <div class="number">4</div>
            </div>
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20 12V8a2 2 0 00-2-2H6a2 2 0 00-2 2v4m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />
                </svg>
            </div>
        </div>

        <!-- Total Bookings Card -->
        <div class="stat-card">
            <div class="stat-info">
                <h3>Total Bookings</h3>
                <div class="number">7</div>
            </div>
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14" />
                </svg>
            </div>
        </div>
    </section>

    <!-- Quick Actions Section -->
    <section class="actions-section">
        <h2 class="section-title">Management Actions</h2>

        <div class="actions-grid">
            <a href="manage_rooms.php" class="action-card">
                <div class="action-icon">🏨</div>
                <div class="action-text">
                    <h4>Manage Rooms</h4>
                    <p>Add, edit, or remove room listings.</p>
                </div>
            </a>

            <a href="manage_bookings.php" class="action-card">
                <div class="action-icon">📅</div>
                <div class="action-text">
                    <h4>Manage Bookings</h4>
                    <p>View reservation details and status.</p>
                </div>
            </a>

            <a href="logout.php" class="action-card btn-logout">
                <div class="action-icon">🚪</div>
                <div class="action-text">
                    <h4>Logout</h4>
                    <p>Securely exit admin panel.</p>
                </div>
            </a>
        </div>
    </section>

</main>

<?php include '../includes/footer_front.php'; ?>