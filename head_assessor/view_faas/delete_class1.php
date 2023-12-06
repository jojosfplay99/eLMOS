<?php
include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM propertyfaasdb2 WHERE id = '$id'") or die(mysqli_error($con));

?>