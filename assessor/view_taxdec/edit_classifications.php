<?php
include '../db.php';

$id = $_POST['id'];
$clerkid = $_POST['clerkid'];
$tdno = $_POST['tdno_classification'];
$area = $_POST['area'];
$area_mode = $_POST['area_mode'];
$per_sqm = $_POST['per_sqm'];
$basic_value = $_POST['basic_value'];
$depreciated_level = $_POST['depreciated_level'];
$depreciated_value = $_POST['depreciated_value'];
$adjustment_level = $_POST['adjustment_level'];
$marketvalue = $_POST['marketvalue'];
$assessment_level = $_POST['assessment_level'];
$assessed_value = $_POST['assessed_value'];

mysqli_query($con, "UPDATE propertydb2_rpt SET area = '$area', area_mode = '$area_mode', per_sqm = '$per_sqm', depreciated_level = '$depreciated_level', depreciated_value = '$depreciated_value', basic_value = '$basic_value', marketvalue = '$marketvalue', assessedlevel = '$assessment_level', assessedvalue = '$assessed_value' WHERE id = '$id'") or die(mysqli_error($con));
?>