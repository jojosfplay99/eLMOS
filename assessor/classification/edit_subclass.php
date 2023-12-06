<?php

include '../db.php';
$id = mysqli_escape_string($con,$_POST['id']);
$classification = mysqli_escape_string($con,$_POST['classification']);
$code = mysqli_escape_string($con,$_POST['code']);
$mode = mysqli_escape_string($con,$_POST['mode']);
$description = mysqli_escape_string($con,$_POST['description']);
$value = mysqli_escape_string($con,$_POST['value']);
$status = mysqli_escape_string($con,$_POST['status']);

mysqli_query($con,"UPDATE landsubclasses SET general_class = '$classification', subclass_code = '$code', mode = '$mode', description = '$description', value = '$value', status = '$status' WHERE landSubclassesID = '$id'");

echo json_encode($data);

?>