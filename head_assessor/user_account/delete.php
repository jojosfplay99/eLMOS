<?php
include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM user WHERE id = '$id'");


?>