<?php

include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM improvementsbuildingsclasses WHERE improvementsBuildingsClassesID='$id'");

?>