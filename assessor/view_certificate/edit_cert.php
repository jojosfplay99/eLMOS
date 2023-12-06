<?php
include '../db.php';

$id = $_POST['id'];
$title = mysqli_escape_string($con,$_POST['title']);
$tracer_id = $_POST['tracer_id'];
$requested_by = mysqli_escape_string($con,$_POST['requested_by']);
$html_text = mysqli_escape_string($con,$_POST['html_taxdec']);
$date_created = $_POST['date_created'];

mysqli_query($con,"UPDATE certifications SET title = '$title',tracerid = '$tracer_id',requested_by = '$requested_by',html_text = '$html_text',date_created = '$date_created' WHERE id = '$id'") or die(mysqli_error($con));

?>