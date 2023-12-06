<?php

include '../db.php';

$prefix = mysqli_escape_string($con,$_POST['prefix']);

mysqli_query($con,"UPDATE prefix_data SET prefix_tdno = '$prefix'");

echo $prefix;


?>