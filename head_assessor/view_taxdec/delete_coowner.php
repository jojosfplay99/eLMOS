<?php
include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM co_owners WHERE id = '$id'");


?>