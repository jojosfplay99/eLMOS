<?php
include '../db.php';
$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM machine_appraisal WHERE propertyid = '$id'");
while($row = mysqli_fetch_array($query)){
    $array[] = array(
        "id" => $row['id'],
        "propertyid" => $row['propertyid'],
        "kind_of_machine" => $row['kind_of_machine'],
        "brand" => $row['brand'],
        "model" => $row['model'],
        "capacity_hp" => $row['capacity_hp'],
        "date_acquired" => $row['date_acquired'],
        "condition_acquired" => $row['condition_acquired'],
        "estimated_life" => $row['estimated_life'],
        "remaining_life" => $row['remaining_life'],
        "year_installed" => $row['year_installed'],
        "year_initial_operation" => $row['year_initial_operation'],
        "original_cost" => number_format($row['original_cost'],2),
        "conversion_factor" => $row['conversion_factor'],
        "no_of_units" => $row['no_of_units'],
        "rcn" => $row['rcn'],
        "rate_of_depreciation" => $row['rate_of_depreciation'],
        "percentage_depreciation" => $row['percentage_depreciation'],
        "value_depreciation" => number_format($row['value_depreciation'],2),
        "total_value_depreciation" => number_format($row['total_value_depreciation'],2),
        "total_value_depreciation2" =>$row['total_value_depreciation'],
        "date_created" => $row['date_created'],
    );
}
    

    echo json_encode($array);


?>