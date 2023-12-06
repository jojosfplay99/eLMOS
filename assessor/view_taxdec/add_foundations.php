<?php

include '../db.php';

$new_foundation = $_POST['new_foundation'];

mysqli_query($con,"INSERT INTO materials_foundations(name) VALUES('$new_foundation')");

//echo $id;
?>