<?php
$prj_folder_extend_ = __DIR__;
if ($prj_folder_extend_ == 'C:\xampp\htdocs\git_red_lotus_bungalow\config') {
/* Local */
$host = "localhost";
$db   = "red_lotus";
$user = "root";
$pass = "";
$charset = "utf8mb4";
} elseif ($prj_folder_extend_ == '/home/vol18_2/infinityfree.com/if0_41200738/htdocs/git_red_lotus_bungalow\config') {
    /* Remote */
    $host = "sql305.infinityfree.com";
    $db = "if0_41200738_red_lotus";
    $user = "if0_41200738";
    $pass = "Aa499404";
    $charset = "utf8mb4";
}

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$dsn = "mysql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    var_dump($dsn, $user, $pass);
    // exit;
    die("Database connection failed: " . $e->getMessage());
}
?>
