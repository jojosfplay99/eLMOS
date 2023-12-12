<?php
include '../db.php';

$id = $_POST['id'];
$ass_id = $_POST['ass_id'];

mysqli_query($con,"DELETE FROM rpt_computation WHERE id = '$id'");
mysqli_query($con,"UPDATE rpt_assessment SET status = 'PENDING' WHERE id = '$ass_id'");

?>