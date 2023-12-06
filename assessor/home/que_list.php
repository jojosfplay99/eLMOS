<?php
include '../db.php';

$clerkid = $_POST['clerkid'];
$dated = date('Y-m-d');

$query = mysqli_query($con,"SELECT * FROM que_assessor WHERE date_sched LIKE '$dated' AND status LIKE 'SERVING' AND clerkid LIKE'$clerkid'");
if(mysqli_num_rows($query) == 0){
    $count = 0;
    $que_number = "-";
    $que_id = 0;
}
else{
    $count = 1;
    while($row = mysqli_fetch_array($query)){
        $que_id = $row['id'];
        $que_number = $row['que_print'];
        $date_sched = $row['date_sched'];
        $designation = $row['designation'];
        $status = $row['status'];
    }
}

$array = array(
    "count" => $count,
    "que_id" => $que_id,
    "que_number" => $que_number,
);

echo json_encode($array)

?>