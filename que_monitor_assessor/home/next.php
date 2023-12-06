<?php
include '../db.php';

$id = $_POST['que_id'];
$clerkid = $_POST['clerkid'];
$dated = date('Y-m-d');

mysqli_query($con,"UPDATE que_assessor SET status = 'DONE' WHERE id = '$id'");

$query = mysqli_query($con,"SELECT MIN(que_number) as que_number, id FROM que_assessor WHERE date_sched LIKE '$dated' AND status LIKE 'WAITING'");
while($row = mysqli_fetch_array($query)){
    $id2 = $row["id"];
    $que_number = $row["que_number"];
}

mysqli_query($con,"UPDATE que_assessor SET status = 'SERVING', clerkid = '$clerkid' WHERE id = '$id2'");

?>