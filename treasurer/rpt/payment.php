<?php
include '../db.php';

$clerkid = $_POST['clerkid'];
$transaction_code = $_POST['transaction_code'];
$dated = date('Y-m-d');


$query = mysqli_query($con,"SELECT * FROM rpt_computation WHERE transaction_code LIKE '$transaction_code'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $assessment_id = $row['assessment_id'];
    $ornumber = $row['ornumber'];
    mysqli_query($con,"UPDATE rpt_assessment SET status = 'PAID' WHERE id LIKE '$assessment_id'");
    mysqli_query($con,"UPDATE rpt_computation SET date_paid = '$dated', status = 'PAID' , clerkid = '$clerkid' WHERE assessment_id = '$id'");
}

mysqli_query($con,"UPDATE or_generate SET transaction_code = '$transaction_code',dated = '$dated', clerkid = '$clerkid', status = 'PAID' WHERE ornumber = '$ornumber'");


?>