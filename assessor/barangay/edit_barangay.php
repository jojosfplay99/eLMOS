<?php

include '../db.php';
$id = mysqli_escape_string($con,$_POST['id']);
$code = mysqli_escape_string($con,$_POST['code']);
$description = mysqli_escape_string($con,$_POST['barangay']);

mysqli_query($con,"UPDATE barangays SET code = '$code', barangay = '$description' WHERE id = '$id'");

?>