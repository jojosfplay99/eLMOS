<?php
include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM building_faas_desc WHERE rpt_id = '$id'");
if(mysqli_num_rows($query) == 0){
    $structure_type = " ";
    $no_of_storeys = " ";
    $building_permit = " ";
    $date_issued = " ";
    $cct = " ";
    $coc_date = null;
    $coo_date = null;
    $date_constructed = null;
    $date_completed = null;
    $date_occupied = null;
    $date_renovated = null;
}
else{
    while($row = mysqli_fetch_array($query)){
        $structure_type = $row['structure_type'];
        $no_of_storeys = $row['no_of_storeys'];
        $building_permit = $row['building_permit'];
        $date_issued = $row['date_issued'];
        $cct = $row['cct'];
        $coc_date = $row['coc_date'];
        $coo_date = $row['coo_date'];
        $date_constructed = $row['date_constructed'];
        $date_completed = $row['date_completed'];
        $date_occupied = $row['date_occupied'];
        $date_renovated = $row['date_renovated'];
    }
}

$array = array(
    "structure_type" => $structure_type,
    "no_of_storeys" => $no_of_storeys,
    "building_permit" => $building_permit,
    "date_issued" => $date_issued,
    "cct" => $cct,
    "coc_date" => $coc_date,
    "coo_date" => $coo_date,
    "date_constructed" => $date_constructed,
    "date_completed" => $date_completed,
    "date_occupied" => $date_occupied,
    "date_renovated" => $date_renovated
);


echo json_encode($array);

?>