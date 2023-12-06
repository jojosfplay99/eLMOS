<?php
include '../db.php';
$clerkid = $_POST['clerkid'];
$transaction_code = $_POST['transaction_code'];
$dated = date('Y-m-d');

mysqli_query($con,"UPDATE form51 SET status = 'PAID' WHERE transnum LIKE '$transaction_code'");

$query = mysqli_query($con,"SELECT * FROM form51 WHERE transnum LIKE '$transaction_code'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $ornumber = $row['ornumber'];    
}

mysqli_query($con,"UPDATE or_generate SET transaction_code = '$transaction_code', dated = '$dated', status = 'PAID' , clerkid = '$clerkid' WHERE ornumber = '$ornumber'");


?>