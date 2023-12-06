<?php

include '../db.php';

$classification = mysqli_escape_string($con,$_POST['classification']);
$code = mysqli_escape_string($con,$_POST['code']);
$mode = mysqli_escape_string($con,$_POST['mode']);
$description = mysqli_escape_string($con,$_POST['description']);
$value = mysqli_escape_string($con,$_POST['value']);
$rangeLowerBound = mysqli_escape_string($con,$_POST['rangeLowerBound']);
$rangeUpperBound = mysqli_escape_string($con,$_POST['rangeUpperBound']);
$status = mysqli_escape_string($con,$_POST['status']);
$type = mysqli_escape_string($con,$_POST['type']);

$query = mysqli_query($con,"SELECT * FROM improvementsbuildingsclasses WHERE subclass_code LIKE'$code' OR description LIKE '$description'");
if(mysqli_num_rows($query) == 0){
    mysqli_query($con,"INSERT INTO improvementsbuildingsclasses (general_class, subclass_code, mode, description ,rangeLowerBound, rangeUpperBound, value, type, status) VALUES ('$classification','$code','$mode', '$description','$rangeLowerBound', '$rangeUpperBound', '$value','$type', '$status')");
    echo "success";
}
else{
    echo "not success";
}




?>