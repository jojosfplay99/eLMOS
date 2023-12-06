<?php
include '../db.php';

$dated = date('Y-m-d');
$clerkid = $_POST['clerkid'];
$ornumber = $_POST['ornumber'];
$transnum = $_POST['transnum'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$civil_status = $_POST['civil_status'];
$bdate = $_POST['bdate'];
$address = $_POST['address'];
$placeofbirth = $_POST['placeofbirth'];
$citizenship = $_POST['citizenship'];
$ctctype = $_POST['ctctype'];
$basic = $_POST['basic'];
$gross = $_POST['gross'];
$taxdue = $_POST['taxdue'];
$interest = $_POST['interest'];
$penalty = $_POST['penalty'];
$total = $_POST['total'];

mysqli_query($con,"INSERT INTO cedula(ctctype, date_applied, fname, mname, lname, gender, civil_status, bdate, citizenship, placeofbirth, address1, gross, compute, interest, total, transnum, ornumber, status, clerkid, remittance, batch, or_code, remittance_number)VALUES('$ctctype', '$dated', '$fname', '$mname', '$lname', '$gender', '$civil_status', '$bdate', '$citizenship', '$placeofbirth', '$address', '$gross', '$taxdue', '$penalty', '$total', '$transnum', '$ornumber', 'PAID', '$clerkid', null, null, null, null)");
mysqli_query($con,"UPDATE or_generate SET transaction_code = '$transnum', dated = '$dated', status = 'PAID' , clerkid = '$clerkid' WHERE ornumber = '$ornumber'");
/*mysqli_query($con,"UPDATE form51 SET status = 'PAID' WHERE transnum LIKE '$transaction_code'");

$query = mysqli_query($con,"SELECT * FROM form51 WHERE transnum LIKE '$transaction_code'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $ornumber = $row['ornumber'];    
}


*/




?>