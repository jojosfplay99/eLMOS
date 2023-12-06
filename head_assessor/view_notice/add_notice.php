<?php

include '../db.php';

$assessment_propertyid = mysqli_escape_string($con,$_POST['assessment_propertyid']);
$assessment_tdno = mysqli_escape_string($con,$_POST['assessment_tdno']);
$assessment_lotno = mysqli_escape_string($con,$_POST['assessment_lotno']);
$assessment_year = mysqli_escape_string($con,$_POST['assessment_year']);
$assessment_ownername = mysqli_escape_string($con,$_POST['assessment_ownername']);
$assessment_propertylocation = mysqli_escape_string($con,$_POST['assessment_propertylocation']);
$assessment_marketvalue = mysqli_escape_string($con,$_POST['assessment_marketvalue']);
$assessment_assessedvalue = mysqli_escape_string($con,$_POST['assessment_assessedvalue']);
$assessment_percentage = mysqli_escape_string($con,$_POST['assessment_percentage']);
$percent_val = $assessment_percentage / 100;
$assessment_value = $assessment_assessedvalue * $percent_val;
$assessment_basic = mysqli_escape_string($con,$_POST['assessment_basic']);
$assessment_sef = mysqli_escape_string($con,$_POST['assessment_sef']);
$assessment_classification = mysqli_escape_string($con,$_POST['assessment_classification']);
$assessment_total = $_POST['assessment_total'];

$dated = date('Y-m-d');

mysqli_query($con,"INSERT INTO assessment_notice (propertyid, ownername, tdno, lotno, propertylocation, classification, year, assessedvalue, basic_tax, sef_tax, adjustment_percentage, adjustment_value, total_data, date_created) values( '$assessment_propertyid', '$assessment_ownername', '$assessment_tdno','$assessment_lotno', '$assessment_propertylocation','$assessment_classification' ,'$assessment_year', '$assessment_assessedvalue','$assessment_basic', '$assessment_sef', '$assessment_percentage', '$assessment_value', '$assessment_total', '$dated')") or die(mysqli_error($con));

echo "OK";

?>