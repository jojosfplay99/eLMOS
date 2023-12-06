<?php
include '../db.php';
$id = $_POST['id'];
$status = $_POST['status'];
$query = mysqli_query($con,"UPDATE user SET status = '$status' WHERE id = '$id'");

?>