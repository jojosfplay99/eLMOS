<?php
include '../db.php';

$dated = date('Y-m-d');

$query = mysqli_query($con,"SELECT * FROM que_assessor WHERE date_sched LIKE '$dated' AND status LIKE 'SERVING'") or die(mysqli_error($con)); 
echo mysqli_num_rows($query);

?>