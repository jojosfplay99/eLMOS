<?php
include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM rpt_assessment WHERE id = '$id'");


?>