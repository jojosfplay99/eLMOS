<?php
include '../db.php';
$lock_password = $_POST['lock_password'];

$query = mysqli_query($con,"UPDATE prefix_data SET lockpass = '$lock_password'");


?>