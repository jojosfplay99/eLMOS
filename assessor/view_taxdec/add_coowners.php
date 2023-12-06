<?php
include '../db.php';


$propertyid_new = $_POST['propertyid_new'];
$ownername = mysqli_escape_string($con,$_POST['ownername']);
$ownertin = $_POST['ownertin'];
$ownertel = $_POST['ownertel'];
$owneraddress = mysqli_escape_string($con,$_POST['owneraddress']);


mysqli_query($con,"INSERT INTO `co_owners` (`propertyid`, `coowner`, `tin`, `tel`, `address`) VALUES ('$propertyid_new', '$ownername', '$ownertin', '$ownertel', '$owneraddress')") or die(mysqli_error($con));

?>