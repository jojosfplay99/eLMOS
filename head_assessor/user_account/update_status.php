<?php
include '../db.php';
$homescreen = $_POST['homescreen'];

$query = mysqli_query($con,"UPDATE prefix_data SET lock_home = '$homescreen'");


?>