<?php

include '../db.php';

$title = mysqli_escape_string($con,$_POST['title']);
$tracer_id = $_POST['tracer_id'];
$requested_by = mysqli_escape_string($con,$_POST['requested_by']);
$html_text = mysqli_escape_string($con,$_POST['html_taxdec']);
$date_created = $_POST['date_created'];

mysqli_query($con,"INSERT INTO certifications(title,tracerid,requested_by,html_text,date_created) VALUES('$title','$tracer_id','$requested_by','$html_text','$date_created')")

?>