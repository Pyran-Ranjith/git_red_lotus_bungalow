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
//--------------------------------------------------------------------------------
?>

<!-- <?php $title = "Db Test"; ?>
<div class="col">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center"><?php echo $title ?></h1>
            <a href="<?php echo "create-admin.php" ?>" class="btn btn-primary mb-4 text-center float-right">Create Admin</a>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $r['id'] ?></td>
                        <td><?php echo $r['customer_name'] ?></td>
                        <td><?php echo $r['email'] ?></td>
                        <td>
                            <a href="view-admin.php?id=<?php echo $r['id'] ?>" class="btn btn-primary">View</a>
                            <a href="edit-admin.php?id=<?php echo $r['id'] ?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete-admin.php?id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div> -->