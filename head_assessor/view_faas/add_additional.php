<?php

include '../db.php';

$new_additional = $_POST['new_additional'];

mysqli_query($con,"INSERT INTO materials_additional (name) VALUES('$new_additional')");

//echo $id;
?>