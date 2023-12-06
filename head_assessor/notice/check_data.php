<?php
include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM assessment_notice WHERE propertyid = '$id'");
echo mysqli_num_rows($query);


?>