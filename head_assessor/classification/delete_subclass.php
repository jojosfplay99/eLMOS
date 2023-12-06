<?php

include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM landsubclasses WHERE landSubclassesID='$id'");

?>