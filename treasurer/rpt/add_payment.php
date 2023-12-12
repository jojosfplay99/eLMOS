<?php
include '../db.php';

$or_id = $_POST['or_id'];
$clerkid = $_POST['clerkid'];
$id = $_POST['id'];
$compute_code = $_POST['compute_code'];
$propertyid = $_POST['propertyid'];
$transaction_code = $_POST['transaction_code'];
$ornum = $_POST['ornum'];
$tdno = $_POST['tdno'];
$assessedvalue = $_POST['assessedvalue'];
$taxyear = $_POST['taxyear'];
$due_date = $_POST['due_date'];
$taxdue = $_POST['taxdue'];
$discount = $_POST['discount'];
$penalty = $_POST['penalty'];
$payment_mode = $_POST['payment_mode'];
$total_taxdue = $_POST['total_taxdue'];
$basic = $_POST['basic'];
$sef = $_POST['sef'];
$additional_penalties = $_POST['additional_penalties'];
$grand_total_taxdue = $_POST['grand_total_taxdue'];
$tags = $_POST['tags'];

$query = mysqli_query($con,"SELECT * FROM rpt_computation WHERE assessment_id LIKE '$id'");
if(mysqli_num_rows($query) == '0'){
    mysqli_query($con,"INSERT INTO `rpt_computation` (`transaction_code`, `ornumber`, `propertyid`, `taxdec`, `taxyear`, `total_assessedvalue`, `taxdue`, `basic`, `sef`, `penalties`, `discount`,  `penalty_add`, `total`, `clerkid`, `date_paid`, `compute_code`, `assessment_id`, `payment`, `status`) VALUES ('$transaction_code', '$ornum', '$propertyid', '$tdno', '$taxyear', '$assessedvalue', '$total_taxdue', '$basic', '$sef', '$penalty', '$discount', '$additional_penalties',  '$grand_total_taxdue', '$clerkid', NULL, '$compute_code', '$id', 'WAITING', '$tags')") or die(mysqli_error($con));
    mysqli_query($con,"UPDATE rpt_assessment SET status = 'WAITING' where id LIKE '$id'");
    echo "0";
}else{
    echo "1";
}



?>