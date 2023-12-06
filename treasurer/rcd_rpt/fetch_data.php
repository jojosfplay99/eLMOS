<?php

include '../db.php';
$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM user WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
    $clerkname = $row['name'];
}

$query = mysqli_query($con,"SELECT * FROM rpt_computation WHERE clerkid = '$id'");
while($row = mysqli_fetch_array($query)){
    
   
}

$query2 = mysqli_query($con,"SELECT * FROM prefix_data");
while($row2 = mysqli_fetch_array($query2)){
    $prefix_municipality = $row2['prefix_municipality'];
    $prefix_province = $row2['prefix_province'];   
}

$query3 = mysqli_query($con,"SELECT * FROM user WHERE designation = '1'");
while($row3 = mysqli_fetch_array($query3)){
    $head_name = $row3['name'];
}



$array = array(
    "id" => $id,   
    "prefix_municipality" => $prefix_municipality,
    "prefix_province" => $prefix_province,
    "head_name" => $head_name,
    "clerkname" => $clerkname,
);

echo json_encode($array);

?>