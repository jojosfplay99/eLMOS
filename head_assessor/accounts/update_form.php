<?php
include '../db.php';

$clerkid = $_POST['clerkid'];
$username = $_POST['username'];
$password = $_POST['password'];
$select_designation = $_POST['select_designation'];

mysqli_query($con,"UPDATE user SET user = '$username', password = '$password', designation = '$select_designation' WHERE id = '$clerkid'");

?>