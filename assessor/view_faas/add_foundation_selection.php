<?php

include '../db.php';

$new_foundation = $_POST['select_foundation'];
$id = $_POST['id'];



mysqli_query($con,"INSERT INTO structural_foundations(faasid,material) VALUES('$id','$new_foundation')");




?>