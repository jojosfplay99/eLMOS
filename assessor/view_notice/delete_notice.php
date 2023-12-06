<?php
include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM assessment_notice WHERE id = '$id'") or die(mysqli_error($con));

?>