<?php

include '../db.php';

$new_wall = $_POST['new_walling'];

mysqli_query($con,"INSERT INTO materials_wall(name) VALUES('$new_wall')");

//echo $id;
?>