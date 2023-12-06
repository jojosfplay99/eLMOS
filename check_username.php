<?php
include 'assessor/db.php';
$username = $_POST['username'];

$query = mysqli_query($con,"SELECT * FROM user WHERE user LIKE '$username'");
echo mysqli_num_rows($query);

?>