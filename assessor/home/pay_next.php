<?php
include '../db.php';
$clerkid  = $_POST['clerkid'];
$id  = $_POST['id'];

$dated = date('Y-m-d');

mysqli_query($con,"UPDATE que_assessor SET status = 'DONE' WHERE id ='$id'");

$query3 = mysqli_query($con,"SELECT * FROM que_assessor WHERE id = '$id'");
while($row3 = mysqli_fetch_array($query3)){
    $que_number1 = $row3['que_number'];
    $que_print1 = $row3['que_print'];
    $date_sched1 = $row3['date_sched'];
    $designation1 = $row3['designation'];
    $status1 = $row3['status'];
    $clerkid1 = $row3['clerkid'];
    $clerkid_des1 = $row3['clerkid_des'];
    mysqli_query($con,"INSERT INTO que_treasurer(que_number,que_print,date_sched,designation,status,clerkid,clerkid_des)VALUES('$que_number1','$que_print1','$dated','A-PAYMENT','WAITING',null,null)") or die(mysqli_error($con));
}

?>