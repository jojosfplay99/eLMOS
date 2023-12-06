<?php
include '../db.php';

$propertyid = $_POST['propertyid'];
$clerkid = $_POST['clerkid'];
$tdno = $_POST['tdno_classification'];
$area = $_POST['area'];
$area_mode = $_POST['area_mode'];
$per_sqm = $_POST['per_sqm'];
$classification = $_POST['classification'];
$classification_name = $_POST['classification_name'];
$sub_classification = $_POST['sub_classification'];
$actual_use = $_POST['actual_use'];
$unit_value = $_POST['unit_value'];
$basic_value = $_POST['basic_value'];
$adjustment_level = $_POST['adjustment_level'];
$marketvalue = $_POST['marketvalue'];
$assessment_level = $_POST['assessment_level'];
$assessed_value = $_POST['assessed_value'];

$depreciated_level = $_POST['depreciated_level'];
$depreciated_value = $_POST['depreciated_value'];
$floor_item = $_POST['floor_item'];
$adjustment_factor = $_POST['adjustment_factor'];


$marketvalue = round($marketvalue * .10);
$marketvalue = $marketvalue * 10;

$assessed_value = round($assessed_value * .10);
$assessed_value = $assessed_value * 10;


mysqli_query($con,"INSERT INTO propertydb2_rpt(propertyid, tdno, floor_item, classification, sub_classification, adjustment_factor, area, area_mode, per_sqm, basic_value, depreciated_level, depreciated_value,marketvalue, adjustment_level, actualuse, assessedlevel, assessedvalue, status, clerkid) VALUES('$propertyid', '$tdno', '$floor_item', '$classification_name', '$sub_classification', '$adjustment_factor', '$area', '$area_mode', '$per_sqm', '$basic_value','$depreciated_level','$depreciated_value', '$marketvalue', '$adjustment_level', '$actual_use', '$assessment_level', '$assessed_value', 'Active', '$clerkid')") or die(mysqli_error($con))

?>