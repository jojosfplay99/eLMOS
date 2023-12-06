<?php
include '../db.php';
$id = $_POST['gen_id'];
$status_gen_add = $_POST['status_gen_add'];
$structural_type = $_POST['structural_type'];
$building_number = $_POST['building_number'];
$issued_on = $_POST['issued_on'];
$cct = $_POST['cct'];
$year_constructed = $_POST['year_constructed'];
$coc = $_POST['coc'];
$year_completed = $_POST['year_completed'];
$coo = $_POST['coo'];
$year_occupied = $_POST['year_occupied'];
$storey = $_POST['storey'];
$year_renovated = $_POST['year_renovated'];

if($status_gen_add =='NONE'){
    mysqli_query($con,"INSERT INTO building_faas_desc(rpt_id,structure_type,no_of_storeys,building_permit,date_issued,cct,coc_date,coo_date,date_constructed,date_completed,date_occupied,date_renovated) VALUES('$id','$structural_type','$storey','$building_number','$issued_on','$cct','$coc','$coo','$year_constructed','$year_completed','$year_occupied','$year_renovated')")or die(mysqli_error($con));
}else{
    mysqli_query($con,"UPDATE building_faas_desc SET structure_type = '$structural_type', no_of_storeys = '$storey', building_permit = '$building_number', date_issued = '$issued_on', cct = '$cct', coc_date = '$coc', coo_date = '$coo', date_constructed = '$year_constructed',  date_completed = '$year_completed', date_occupied = '$year_occupied', date_renovated = '$year_renovated' WHERE rpt_id = '$id'")or die(mysqli_error($con));
}

?>