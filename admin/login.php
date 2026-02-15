<?php
session_start();
require '../config/database.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if($user && password_verify($_POST['password'], $user['password'])){
        $_SESSION['admin'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Invalid Login</div>";
    }
}
?>

<form method="POST" class="container mt-5 col-md-4">
    <h3>Admin Login</h3>
    <input name="username" class="form-control mb-2" placeholder="Username">
    <input name="password" type="password" class="form-control mb-2" placeholder="Password">
    <button class="btn btn-danger w-100">Login</button>
</form>
