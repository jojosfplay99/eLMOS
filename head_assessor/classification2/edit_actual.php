<?php

include '../db.php';
$id = mysqli_escape_string($con,$_POST['id']);
$classification = mysqli_escape_string($con,$_POST['classification']);
$code = mysqli_escape_string($con,$_POST['code']);
$description = mysqli_escape_string($con,$_POST['description']);
$rangeLowerBound = mysqli_escape_string($con,$_POST['rangeLowerBound']);
$rangeUpperBound = mysqli_escape_string($con,$_POST['rangeUpperBound']);
$value = mysqli_escape_string($con,$_POST['value']);
$status = mysqli_escape_string($con,$_POST['status']);


mysqli_query($con,"UPDATE improvementsbuildingsactualuses SET code = '$code', general_class = '$classification', description = '$description', rangeLowerBound = '$rangeLowerBound', rangeUpperBound = '$rangeUpperBound', value = '$value', status = '$status' WHERE improvementsBuildingsActualUsesID = '$id' ");



?>