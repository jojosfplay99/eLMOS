<?php

include '../db.php';

$new_floor = $_POST['new_floor'];

mysqli_query($con,"INSERT INTO materials_floor(name) VALUES('$new_floor')");

//echo $id;
?>