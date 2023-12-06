<?php
include '../db.php';
$id = $_POST['id'];

mysqli_query($con,"DELETE FROM structural_roof WHERE id = '$id'");

echo $id;
?>