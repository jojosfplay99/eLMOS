<?php

include '../db.php';
$id = mysqli_escape_string($con,$_POST['id']);
$classification = mysqli_escape_string($con,$_POST['classification']);
$code = mysqli_escape_string($con,$_POST['code']);
$description = mysqli_escape_string($con,$_POST['description']);
$value = mysqli_escape_string($con,$_POST['value']);
$status = mysqli_escape_string($con,$_POST['status']);


mysqli_query($con,"UPDATE machineriesactualuses SET code = '$code', general_class = '$classification', description = '$description', value = '$value', status = '$status' WHERE machineriesActualUsesID = '$id' ");



?>