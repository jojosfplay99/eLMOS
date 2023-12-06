<?php
include '../db.php';

$id_add = $_POST['id_add'];
$propertyid_add = $_POST['propertyid_add'];
$ownername = mysqli_escape_string($con,$_POST['ownername']);
$ownertin = $_POST['ownertin'];
$ownertel = $_POST['ownertel'];
$owneraddress = mysqli_escape_string($con,$_POST['owneraddress']);

mysqli_query($con,"UPDATE co_owners SET coowner = '$ownername', tin = '$ownertin', tel = '$ownertel', address = '$owneraddress' WHERE id = '$id_add'");

?>