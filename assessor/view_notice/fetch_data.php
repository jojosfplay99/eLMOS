<?php
include '../db.php';

$id = $_POST['id'];


$query = mysqli_query($con,"SELECT * FROM prefix_data");
while($row = mysqli_fetch_array($query)){
    $prefix_municipality = $row['prefix_municipality'];
    $prefix_province = $row['prefix_province'];   
}

$query2 = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE id = '$id'");
while($row2 = mysqli_fetch_array($query2)){
    $ownername = $row2['ownername'];
    $property_address = $row2['propertylocation'];
    $tdno = $row2['tdno'];
    $lotno = $row2['lotno'];    
}

$query3 = mysqli_query($con,"SELECT * FROM user WHERE designation = '2'");
while($row3 = mysqli_fetch_array($query3)){
    $head_name = $row3['name'];
}

$array = array(
    "prefix_municipality" => $prefix_municipality,
    "prefix_province" => $prefix_province,
    "property_owner" => $ownername,
    "property_address" => $property_address,
    //"html_text" => $html_text,
    //"requested_by" => $requested_by,
    "head_name" => $head_name,
);

echo json_encode($array);

?>