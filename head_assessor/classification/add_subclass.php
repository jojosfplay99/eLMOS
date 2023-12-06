<?php

include '../db.php';

$classification = mysqli_escape_string($con,$_POST['classification']);
$code = mysqli_escape_string($con,$_POST['code']);
$mode = mysqli_escape_string($con,$_POST['mode']);
$description = mysqli_escape_string($con,$_POST['description']);
$value = mysqli_escape_string($con,$_POST['value']);
$status = mysqli_escape_string($con,$_POST['status']);


$query = mysqli_query($con,"SELECT * FROM landsubclasses WHERE subclass_code LIKE'$code' OR description LIKE '$description'");
if(mysqli_num_rows($query) == 0){
    mysqli_query($con,"INSERT INTO landsubclasses (general_class, subclass_code, mode, description, value, status) VALUES ('$classification','$code','$mode', '$description', '$value', '$status')");
    echo "success";
}
else{
    echo "not success";
}




?>