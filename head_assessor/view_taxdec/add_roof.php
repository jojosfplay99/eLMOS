<?php

include '../db.php';

$new_roof = $_POST['select_roof'];
$id = $_POST['id'];

mysqli_query($con,"INSERT INTO structural_roof(faasid,material) VALUES('$id','$new_roof')");

echo $id;
?>