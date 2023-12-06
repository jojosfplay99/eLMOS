<?php

include "../db.php";

$counter = $_POST['counter'];
$total_length = $_POST['total_length'];
$counter_inc = $counter+1;
if(isset($_POST['counter'])){
	$id = $_POST['id'];
}


mysqli_query($con,"UPDATE propertydb_rpt SET status = 'ACTIVE' WHERE id = '$id'");	

$array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length);

echo json_encode($array)
?>