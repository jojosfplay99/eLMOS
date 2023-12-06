<?php
include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM form51 WHERE id = '$id'");


?>