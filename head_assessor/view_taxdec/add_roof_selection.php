<?php

include '../db.php';

$new_roof = $_POST['new_roof'];

mysqli_query($con,"INSERT INTO materials_roof(name) VALUES('$new_roof')");

echo $id;


?>