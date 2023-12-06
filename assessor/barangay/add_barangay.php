<?php

include '../db.php';

$barangay =strtoupper($_POST['barangay']);
$code =$_POST['code'];

mysqli_query($con,"INSERT INTO barangays(barangay,code) VALUES('$barangay', '$code')") or die(mysqli_error($con));

echo "success";


?>