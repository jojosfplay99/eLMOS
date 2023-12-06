<?php
include '../db.php';


$dated = date('Y-m-d');

$query = mysqli_query($con,"SELECT * FROM que_treasurer WHERE date_sched LIKE '$dated' AND status LIKE 'SERVING' AND clerkid_des LIKE '3'");
if(mysqli_num_rows($query) == 0){
    $count1 = 0;
    $que_number1 = "-";
    $que_id1 = 0;
}
else{
    $count1 = 1;
    while($row = mysqli_fetch_array($query)){
        $que_id1 = $row['id'];
        $que_number1 = $row['que_print'];
    }
}

$query2 = mysqli_query($con,"SELECT * FROM que_treasurer WHERE date_sched LIKE '$dated' AND status LIKE 'SERVING' AND clerkid_des LIKE '4'");
if(mysqli_num_rows($query2) == 0){
    $count2 = 0;
    $que_number2 = "-";
    $que_id2 = 0;
}
else{
    $count2 = 1;
    while($row2 = mysqli_fetch_array($query2)){
        $que_id2 = $row2['id'];
        $que_number2 = $row2['que_print'];
    }
}

$query3 = mysqli_query($con,"SELECT * FROM que_treasurer WHERE date_sched LIKE '$dated' AND status LIKE 'SERVING' AND clerkid_des LIKE '5'");
if(mysqli_num_rows($query3) == 0){
    $count3 = 0;
    $que_number3 = "-";
    $que_id3 = 0;
}
else{
    $count3 = 1;
    while($row3 = mysqli_fetch_array($query3)){
        $que_id3 = $row3['id'];
        $que_number3 = $row3['que_print'];
    }
}

$array = array(
    "que_number1" => $que_number1,
    "que_number2" => $que_number2,
    "que_number3" => $que_number3,
);

echo json_encode($array)

?>