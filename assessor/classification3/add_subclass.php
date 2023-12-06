<?php

include '../db.php';

$classification = mysqli_escape_string($con,$_POST['classification']);
$code = mysqli_escape_string($con,$_POST['code']);
$description = mysqli_escape_string($con,$_POST['description']);
$value = mysqli_escape_string($con,$_POST['value']);
$status = mysqli_escape_string($con,$_POST['status']);


$query = mysqli_query($con,"SELECT * FROM machineriesclasses WHERE code LIKE'$code' OR description LIKE '$description'");
if(mysqli_num_rows($query) == 0){
    mysqli_query($con,"INSERT INTO machineriesclasses (code, general_class, description, value, status) VALUES ('$code','$classification','$description', '$value', '$status')");
    echo "success";
}
else{
    echo "not success";
}




?>