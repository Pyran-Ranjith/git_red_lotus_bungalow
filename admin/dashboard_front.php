<?php
include '../includes/header_front.php';
include '../includes/navbar_front.php';
include '../includes/load.php';
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
                    <!-- Bed Icon -->
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12V8a2 2 0 00-2-2H6a2 2 0 00-2 2v4m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4m16 0a2 2 0 002-2v-4a2 2 0 00-2-2H6a2 2 0 00-2 2v4a2 2 0 002 2z" />
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
                    <!-- Calendar Icon -->
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </section>

        <!-- Quick Actions Section -->
        <section class="actions-section">
            <h2 class="section-title">Management Actions</h2>
            
            <div class="actions-grid">
                <!-- Manage Rooms -->
                <a href="manage_rooms.php" class="action-card">
                    <div class="action-icon">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="action-text">
                        <h4>Manage Rooms</h4>
                        <p>Add, edit, or remove room listings.</p>
                    </div>
                </a>

                <!-- Manage Bookings -->
                <a href="manage_bookings.php" class="action-card">
                    <div class="action-icon">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <div class="action-text">
                        <h4>Manage Bookings</h4>
                        <p>View reservation details and status.</p>
                    </div>
                </a>

                <!-- Logout (Styled as an action card for visibility) -->
                <a href="logout.php" class="action-card btn-logout">
                    <div class="action-icon">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <div class="action-text">
                        <h4>Logout</h4>
                        <p>Securely exit admin panel.</p>
                    </div>
                </a>
            </div>
        </section>

    </main>

    <!-- Footer -->
<?php
include '../includes/footer_front.php';
?>

    <!-- Minimal JavaScript for Mobile Menu -->
    <script>
        function toggleMenu() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('active');
        }
    </script>
</body>
</html>