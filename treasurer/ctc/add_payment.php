<?php
include '../db.php';

$ornumber = $_POST['ornumber'];
$clerkid = $_POST['clerkid'];
$date_paid = $_POST['date_paid'];
$transaction_code = $_POST['transaction_code'];
$payor = $_POST['payor'];
$ngascode = $_POST['ngascode'];
$naturecol = $_POST['naturecol'];
$amount = $_POST['amount'];

mysqli_query($con,"INSERT INTO form51(collector_id,ornumber,transnum,date_paid,payor,ngas_code,nature_col,amount,status,remittance,batch,batch_code,remittance_number)VALUES('$clerkid','$ornumber','$transaction_code','$date_paid','$payor','$ngascode','$naturecol','$amount','WAITING',null,null,null,null)") or die(mysqli_error($con));

?>