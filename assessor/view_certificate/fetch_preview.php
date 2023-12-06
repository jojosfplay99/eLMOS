<?php
include '../db.php';

$id = $_POST['id'];


$query = mysqli_query($con,"SELECT * FROM prefix_data");
while($row = mysqli_fetch_array($query)){
    $prefix_municipality = $row['prefix_municipality'];
    $prefix_province = $row['prefix_province'];   
}

$query2 = mysqli_query($con,"SELECT * FROM certifications WHERE id = '$id'");
while($row2 = mysqli_fetch_array($query2)){
    $title = $row2['title'];
    $tracerid = $row2['tracerid']; 
    $html_text = $row2['html_text'];
    $requested_by = $row2['requested_by'];
}

$query3 = mysqli_query($con,"SELECT * FROM user WHERE designation = '2'");
while($row3 = mysqli_fetch_array($query3)){
    $head_name = $row3['name'];
}

$array = array(
    "prefix_municipality" => $prefix_municipality,
    "prefix_province" => $prefix_province,
    "title" => $title,
    "tracerid" => $tracerid,
    "html_text" => $html_text,
    "requested_by" => $requested_by,
    "head_name" => $head_name,
);

echo json_encode($array);

?>