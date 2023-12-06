<?php
include '../db.php';

$taxdec_id = $_POST['id'];

$query = mysqli_query($con, "SELECT * FROM building_faas_desc WHERE rpt_id = '$taxdec_id'");
if(mysqli_num_rows($query) == 0){
    $count = mysqli_num_rows($query);
    $structure_type = "";
    $no_of_storeys = "";
    $building_permit = "";
    $date_issued = "";
    $cct = "";
    $coc_date = "";
    $coo_date = "";
    $date_constructed = "";
    $date_completed = "";
    $date_occupied = "";
    $date_renovated = "";
}else{
    while($row = mysqli_fetch_array($query)){
        $count = mysqli_num_rows($query);
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
    "count" => $count,
    "structural_type" => $structure_type,
    "building_number" => $building_permit,
    "issued_on" => $date_issued,
    "cct" => $cct,
    "year_constructed" => $date_constructed,
    "coc" => $coc_date,
    "year_completed" => $date_completed,
    "coo" => $coo_date,
    "year_occupied" => $date_occupied,
    "no_of_storeys" => $no_of_storeys,
    "year_renovated" => $date_renovated ,
);  

echo json_encode($array);

?>