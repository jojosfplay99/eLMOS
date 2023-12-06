<?php

include '../db.php';
$id = mysqli_escape_string($con,$_POST['id']);
$classification = mysqli_escape_string($con,$_POST['classification']);
$code = mysqli_escape_string($con,$_POST['code']);
$mode = mysqli_escape_string($con,$_POST['mode']);
$description = mysqli_escape_string($con,$_POST['description']);
$rangeLowerBound = mysqli_escape_string($con,$_POST['rangeLowerBound']);
$rangeUpperBound = mysqli_escape_string($con,$_POST['rangeUpperBound']);
$value = mysqli_escape_string($con,$_POST['value']);
$type = mysqli_escape_string($con,$_POST['type']);
$status = mysqli_escape_string($con,$_POST['status']);

mysqli_query($con,"UPDATE improvementsbuildingsclasses SET general_class = '$classification', subclass_code = '$code', mode = '$mode', description = '$description', rangeLowerBound = '$rangeLowerBound', rangeUpperBound = '$rangeUpperBound', value = '$value', type = '$type', status = '$status' WHERE improvementsBuildingsClassesID = '$id'");

//mysqli_query($con,"UPDATE landsubclasses SET general_class = '$classification', subclass_code = '$code', mode = '$mode', description = '$description', value = '$value', status = '$status' WHERE landSubclassesID = '$id'");


?>