<?php
include '../db.php';

$counter = $_POST['counter'];
$total_length = $_POST['total_length'];
$counter_inc = $counter+1;
if(isset($_POST['counter'])){
	$id = $_POST['id'];
}
$classname = $_POST['classname'];

mysqli_query($con,"UPDATE landactualuses SET general_class = '$classname' WHERE landActualUsesID = '$id'");

$array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length,"classname"=>$classname);
echo json_encode($array)
?>
