<?php

include '../db.php';

$id = mysqli_escape_string($con, $_POST['id']);
$code = mysqli_escape_string($con, $_POST['code']);
$description = mysqli_escape_string($con, $_POST['description']);
$value = mysqli_escape_string($con, $_POST['value']);
$status = mysqli_escape_string($con, $_POST['status']);

mysqli_query($con, "UPDATE landclasses SET code='$code', description='$description', value='$value', status='$status' WHERE landClassesID='$id'");

?>