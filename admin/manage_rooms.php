<?php
session_start();
require '../config/database.php';

if(isset($_POST['add'])){
    $stmt = $pdo->prepare("INSERT INTO rooms (name,price,description)
                           VALUES (?,?,?)");
    $stmt->execute([$_POST['name'],$_POST['price'],$_POST['desc']]);
}

$rooms = $pdo->query("SELECT * FROM rooms")->fetchAll();
?>

<h3>Manage Rooms</h3>

<form method="POST">
<input name="name" placeholder="Room Name">
<input name="price" placeholder="Price">
<input name="desc" placeholder="Description">
<button name="add">Add Room</button>
</form>

<hr>

<?php foreach($rooms as $room): ?>
<p><?= $room['name'] ?> - $<?= $room['price'] ?></p>
<?php endforeach; ?>
