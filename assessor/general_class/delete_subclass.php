<?php

include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM landclasses WHERE landClassesID='$id'");

?>