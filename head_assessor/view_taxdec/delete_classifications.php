<?php
include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM propertydb2_rpt WHERE id = '$id'") or die(mysqli_error($con));

?>