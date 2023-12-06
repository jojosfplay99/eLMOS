<?php
include 'assessor/db.php';

$login = $_GET['loginpass'];

$query = mysqli_query($con,"SELECT * FROM prefix_data WHERE lockpass = '$login'");
echo mysqli_num_rows($query);

?>