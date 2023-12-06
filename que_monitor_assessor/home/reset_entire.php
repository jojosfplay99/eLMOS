<?php
include '../db.php';

$dated = date('Y-m-d');

mysqli_query($con,"UPDATE que_assessor SET status = 'DONE' WHERE date_sched LIKE '$dated'");



?>