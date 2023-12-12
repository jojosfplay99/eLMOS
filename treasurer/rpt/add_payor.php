<?php
include '../db.php';

$payor = mysqli_escape_string($con,$_POST['payor']);

mysqli_query($con,"INSERT INTO payor_listing (payor_name) VALUES('$payor')") or die(mysqli_error($con));

?>