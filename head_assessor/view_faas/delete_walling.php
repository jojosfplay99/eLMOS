<?php
include '../db.php';
$id = $_POST['id'];

mysqli_query($con,"DELETE FROM structural_walls WHERE id = '$id'");

echo $id;
?>