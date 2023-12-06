<?php

include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM barangays WHERE id='$id'");

?>