<?php
include '../db.php';

$faasid = mysqli_escape_string($con,$_POST['faasid']);
$propertyid = mysqli_escape_string($con,$_POST['propertyid']);
$clerkid = mysqli_escape_string($con,$_POST['clerkid']);
$tdno = mysqli_escape_string($con,$_POST['tdno_classification']);
$area = mysqli_escape_string($con,$_POST['area']);
$area_mode = mysqli_escape_string($con,$_POST['area_mode']);
$per_sqm = mysqli_escape_string($con,$_POST['per_sqm']);
$classification = mysqli_escape_string($con,$_POST['classification']);
$classification_name = mysqli_escape_string($con,$_POST['classification_name']);
$sub_classification = mysqli_escape_string($con,$_POST['sub_classification']);
$actual_use = mysqli_escape_string($con,$_POST['actual_use']);
$unit_value = mysqli_escape_string($con,$_POST['unit_value']);
$basic_value = mysqli_escape_string($con,$_POST['basic_value']);
$adjustment_level = mysqli_escape_string($con,$_POST['adjustment_level']);
$marketvalue = mysqli_escape_string($con,$_POST['marketvalue']);
$actualuse = mysqli_escape_string($con,$_POST['actual_use']);
$assessment_level = mysqli_escape_string($con,$_POST['assessment_level']);
$assessed_value = mysqli_escape_string($con,$_POST['assessed_value']);
$status = mysqli_escape_string($con,$_POST['status_classification']);


mysqli_query($con,"INSERT INTO propertyfaasdb2 (faasid, propertyid, tdno, classification, sub_classification, area, area_mode, per_sqm, basic_value, depreciation_level, depreciation_value, base_market, marketvalue, adjustment_level, actualuse, assessedlevel, assessedvalue, floor_item, status,clerkid)VALUES ('$faasid', '$propertyid', '$tdno', '$classification_name', '$sub_classification', '$area', '$area_mode', '$per_sqm', '$unit_value', null, null, '$basic_value', '$marketvalue', '$adjustment_level', '$actualuse', '$assessment_level', '$assessed_value', null, '$status', '$clerkid')") or die(mysqli_error($con));


?>