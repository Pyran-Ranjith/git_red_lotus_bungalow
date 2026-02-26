<?php
session_start(); // MUST be first

require '../config/database.php';

// If already logged in → redirect
if (!empty($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username && $password) {

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            // ✅ Store admin session properly
            $_SESSION['admin'] = true;
            $_SESSION['admin_username'] = $user['username'];
            $_SESSION['admin_id'] = $user['id'];

            header("Location: dashboard.php");
            exit();

        } else {
            $error = "Invalid Username or Password";
        }

    } else {
        $error = "Please fill all fields";
    }
}

include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="container mt-5 col-md-4">
    <h3 class="mb-3">Admin Login</h3>

    <?php if ($error): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <input name="username" class="form-control mb-3" placeholder="Username" required>
        <input name="password" type="password" class="form-control mb-3" placeholder="Password" required>
        <button class="btn btn-danger w-100">Login</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>