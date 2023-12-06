<?php
include '../db.php';
$clerkid  = $_POST['clerkid'];

$dated = date('Y-m-d');

$query = mysqli_query($con,"SELECT MIN(que_number) as que_number, id FROM que_treasurer WHERE date_sched LIKE '$dated' AND status LIKE 'WAITING'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $que_number = $row['que_number'];
}

$query2 = mysqli_query($con,"SELECT * FROM user WHERE id = '$clerkid'");
while($row2 = mysqli_fetch_array($query2)){
    $designation = $row2["designation"];
}

mysqli_query($con,"UPDATE que_treasurer SET status = 'SERVING' , clerkid = '$clerkid' , clerkid_des = '$designation' WHERE id = '$id'");

?>