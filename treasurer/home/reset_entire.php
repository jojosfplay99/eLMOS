<?php
include '../db.php';

$dated = date('Y-m-d');

mysqli_query($con,"UPDATE que_treasurer SET status = 'DONE' WHERE date_sched LIKE '$dated'");



?>