<?php
include '../db.php';

$propertyid = $_POST['propertyid'];
$transaction_code = $_POST['transaction_code'];
$ornum = $_POST['ornum'];
$tdno = $_POST['tdno'];
$assessedvalue = $_POST['assessedvalue'];
$taxyear = $_POST['taxyear'];
$taxyear = explode('-', $taxyear);


$query = mysqli_query($con,"SELECT * FROM rpt_assessment WHERE propertyid LIKE '$propertyid' AND taxdec LIKE '$tdno' AND taxyear LIKE '$taxyear[0]'");
echo mysqli_num_rows($query);

?>