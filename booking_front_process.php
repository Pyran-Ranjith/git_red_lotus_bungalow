<?php
require 'config/database.php';

// Disply parameters
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $stmt = $pdo->prepare("INSERT INTO bookings 
        (customer_name,email,phone,check_in,check_out,room_type,guests,message)
        VALUES (?,?,?,?,?,?,?,?)");

    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['check_in'],
        $_POST['check_out'],
        $_POST['room_type'],
        $_POST['guests'],
        $_POST['message']
    ]);

if ($stmt->execute()) {
    header("Location: booking_front.php?parm_status=success");
    exit();
} else {
    header("Location: booking_front.php?parm_status=error");
    exit();
}
    }

