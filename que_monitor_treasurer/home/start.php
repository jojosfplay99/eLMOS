<?php
include '../db.php';
$clerkid  = $_POST['clerkid'];

$dated = date('Y-m-d');

$query = mysqli_query($con,"SELECT MIN(que_number) as que_number, id FROM que_assessor WHERE date_sched LIKE '$dated' AND status LIKE 'WAITING'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $que_number = $row['que_number'];
}


mysqli_query($con,"UPDATE que_assessor SET status = 'SERVING' , clerkid = '$clerkid' WHERE id = '$id'");

?>