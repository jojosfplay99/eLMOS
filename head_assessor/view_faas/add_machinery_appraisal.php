<?php

include '../db.php';

$propertyid = mysqli_escape_string($con,$_POST['propertyid']);
$date_created = mysqli_escape_string($con,$_POST['date_created']);
$kind_of_machine = mysqli_escape_string($con,$_POST['kind_of_machine']);
$brand = mysqli_escape_string($con,$_POST['brand']);
$model = mysqli_escape_string($con,$_POST['model']);
$capacity = mysqli_escape_string($con,$_POST['capacity']);
$date_acquired = mysqli_escape_string($con,$_POST['date_acquired']);
$condition_acquired = mysqli_escape_string($con,$_POST['condition_acquired']);
$estimated_life = mysqli_escape_string($con,$_POST['estimated_life']);
$remaining_life = mysqli_escape_string($con,$_POST['remaining_life']);
$year_installed = mysqli_escape_string($con,$_POST['year_installed']);
$year_initial_operation = mysqli_escape_string($con,$_POST['year_initial_operation']);
$original_cost = mysqli_escape_string($con,$_POST['original_cost']);
$conversion_factor = mysqli_escape_string($con,$_POST['conversion_factor']);
$no_of_units = mysqli_escape_string($con,$_POST['no_of_units']);
$rcn = mysqli_escape_string($con,$_POST['rcn']);
$rate_of_depreciation = mysqli_escape_string($con,$_POST['rate_of_depreciation']);
$percentage_depreciation = mysqli_escape_string($con,$_POST['percentage_depreciation']);
$value_depreciation = mysqli_escape_string($con,$_POST['value_depreciation']);
$total_value_depreciation = mysqli_escape_string($con,$_POST['total_value_depreciation']);

mysqli_query($con,"INSERT INTO machine_appraisal ( propertyid, kind_of_machine, brand, model, capacity_hp, date_acquired, condition_acquired, estimated_life, remaining_life, year_installed, year_initial_operation, original_cost, conversion_factor, no_of_units, rcn, rate_of_depreciation, percentage_depreciation, value_depreciation, total_value_depreciation, date_created) VALUES ('$propertyid', '$kind_of_machine', '$brand','$model', '$capacity', '$date_acquired', '$condition_acquired', '$estimated_life', '$remaining_life', '$year_installed', '$year_initial_operation', '$original_cost', '$conversion_factor', '$no_of_units', '$rcn', '$rate_of_depreciation','$percentage_depreciation', '$value_depreciation', '$total_value_depreciation', '$date_created')") or die(mysqli_error($con));

?>