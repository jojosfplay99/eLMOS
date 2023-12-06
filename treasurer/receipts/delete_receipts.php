<?php
include '../db.php';

$id = $_POST['id'];
$batch_code = $_POST['batch_code'];

mysqli_query($con,"DELETE FROM or_batch WHERE id = '$id'");
mysqli_query($con,"DELETE FROM or_generate WHERE batch_code = '$batch_code'");


?>