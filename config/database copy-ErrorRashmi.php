<?php
$prj_folder_extend_ = __DIR__;
if ($prj_folder_extend_ == 'C:\xampp\htdocs\git_red_lotus_bungalow\config') {
    /* Local */
    $hostname = "localhost";
} else {
    /* Remote */
    $hostname = "infinityfree";
}

//Db connection 
if ($hostname == "localhost") {
    $host = "localhost";
    // $dbname = "ud-04-attendence";
    $dbname = "red_lotus";
    $user = "root";
    $pass = "";
} else if ($hostname == "infinityfree") {
    $host = "sql312.infinityfree.com";
    $dbname = "if0_34821597_red_lotus";
    $user = "if0_34821597";
    $pass = "q6CJCIvgPj9zjh5";
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "My SQL db " . $dbname . " Connected Successfully. . . ";
    $results = $pdo->query("SELECT * FROM bookings");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
