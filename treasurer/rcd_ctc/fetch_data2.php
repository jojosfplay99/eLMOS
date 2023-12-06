<?php

include '../db.php';

$id = $_POST['id'];
$min = $_POST['min'];
$max = $_POST['max'];



$query = mysqli_query($con,"SELECT * FROM form51 WHERE collector_id = '$id' AND date_paid BETWEEN '$min' AND '$max' ORDER BY ornumber ASC");
if(mysqli_num_rows($query) == 0){
    $array[] = array(
        "count" => mysqli_num_rows($query),
        "ornumber" => "&nbsp;",
        "date_paid" => "",
        "transnum" => "",
        "payor" => "",
        "ngascode" => "",
        "nature_col" => "",
        "amount" => "",
        "status" => "",
        "remittance" => "",
        "batch" => "",
        "batch_code" => "",
        "remittance_number" => "",
        "clerkid" => "",
    );

}else{
    while($row = mysqli_fetch_array($query)){
        $array[] = array(
            "count" => mysqli_num_rows($query),
            "ornumber" => $row['ornumber'],
            "transnum" => $row['transnum'],
            "date_paid" => $row['date_paid'],
            "payor" => $row['payor'],
            "ngascode" => $row['ngas_code'],
            "nature_col" => $row['nature_col'],
            "amount" => $row['amount'],
            "status" => $row['status'],
            "remittance" => $row['remittance'],
            "batch" => $row['batch'],
            "batch_code" => $row['batch_code'],
            "remittance_number" => $row['remittance_number'],
            "clerkid" => $row['collector_id'],
        );

    }
}





echo json_encode($array);

?>