<?php

include '../db.php';
$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE propertyid = '$id'");
while($row = mysqli_fetch_array($query)){
    $array[] = array(
        'classification'=>$row['classification'],
        'sub_classification'=>$row['sub_classification'],
        'area'=>$row['area'],
        'area_mode'=>$row['area_mode'],
        'per_sqm'=>$row['per_sqm'],
        'marketvalue'=>$row['marketvalue'],
        'adjustment_level'=>$row['adjustment_level'],
        'actualuse'=>$row['actualuse'],
        'assessedlevel'=>$row['assessedlevel'],
        'assessedvalue'=>$row['assessedvalue'],
        'status'=>$row['status'],
    );
}





echo json_encode($array);

?>