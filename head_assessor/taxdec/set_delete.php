<?php

include "../db.php";

$counter = $_POST['counter'];
$total_length = $_POST['total_length'];
$counter_inc = $counter+1;
if(isset($_POST['counter'])){
	$id = $_POST['id'];
}


mysqli_query($con,"DELETE FROM propertydb_rpt WHERE id = '$id'") or die(mysqli_error($con));	

$array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length);

echo json_encode($array)
?>