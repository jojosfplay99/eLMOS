<?php

include '../db.php';

$id = $_POST['id'];
$min = $_POST['min'];
$max = $_POST['max'];



$query = mysqli_query($con,"SELECT * FROM rpt_computation WHERE clerkid = '$id' AND date_paid BETWEEN '$min' AND '$max' ORDER BY ornumber ASC");
if(mysqli_num_rows($query) == 0){
    $array[] = array(
        "count" => mysqli_num_rows($query),
        "ornumber" => null,
        "taxdec" => null,
        "taxyear" => null,
        "taxdue" => null,
        "discount" => null,
        "penalties" => null,
        "penalty_add" => null,
        "total" => null,
        "payment" => null,
        "date_paid" => null,
    );

}else{
    while($row = mysqli_fetch_array($query)){
        $array[] = array(
            "count" => mysqli_num_rows($query),
            "ornumber" => $row['ornumber'],   
            "taxdec" => $row['taxdec'],
            "taxyear" => $row['taxyear'],
            "taxdue" => $row['taxdue'],
            "discount" => $row['discount'],
            "penalties" => $row['penalties'],
            "penalty_add" => $row['penalty_add'],
            "total" => $row['total'],
            "payment" => $row['payment'],
            "date_paid" => $row['date_paid'],
        );

    }
}





echo json_encode($array);

?>