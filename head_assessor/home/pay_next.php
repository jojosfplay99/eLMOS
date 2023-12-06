<?php
include '../db.php';

$id = $_POST['que_id'];
$clerkid = $_POST['clerkid'];
$dated = date('Y-m-d');

mysqli_query($con,"UPDATE que_assessor SET status = 'DONE' WHERE id = '$id'");

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


$query = mysqli_query($con,"SELECT MIN(que_number) as que_number, id FROM que_assessor WHERE date_sched LIKE '$dated' AND status LIKE 'WAITING'");
while($row = mysqli_fetch_array($query)){
    $id2 = $row["id"];
    $que_number = $row["que_number"];
}

$query2 = mysqli_query($con,"SELECT * FROM user WHERE id = '$clerkid'");
while($row2 = mysqli_fetch_array($query2)){
    $designation = $row2["designation"];
}
mysqli_query($con,"UPDATE que_assessor SET status = 'SERVING', clerkid = '$clerkid', clerkid_des = '$designation' WHERE id = '$id2'");

?>