<?php
include '../db.php';

$id = $_POST['id'];
$dated = date('Y');

$query = mysqli_query($con,"SELECT * FROM assessment_notice WHERE propertyid = '$id' AND year LIKE '$dated%'");
while($row = mysqli_fetch_array($query)){
    $array[] = array(
        "tdno" => $row['tdno'],
        "lotno" => $row['lotno'],
        "propertylocation" => $row['propertylocation'],
        "classification" => $row['classification'],
        "year" => $row['year'],
        "assessedvalue" => $row['assessedvalue'],
        "basic_tax" => $row['basic_tax'],
        "sef_tax" => $row['sef_tax'],
        "adjustment_percentage" => $row['adjustment_percentage'],
        "adjustment_value" => $row['adjustment_value'],
        "total_data" => $row['total_data'],
        "date_created" => $row['date_created'],
    );    
}




echo json_encode($array);

?>