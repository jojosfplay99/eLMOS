<?php
include '../db.php';

$password  = $_GET['login'];
$clerkid  = $_GET['clerkid'];

$query = mysqli_query($con,"SELECT * FROM user WHERE id = '$clerkid' AND password = '$password' ");
if(mysqli_num_rows($query) == 0){
    $login = 0;
}else{
    $login = 1;
}
$array = array(
    "login" => $login,
);

echo json_encode($array);

?>