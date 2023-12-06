<?php

include "../db.php";


$counter = $_POST['counter'];
$total_length = $_POST['total_length'];
$mode_data = $_POST['classmode'];
$counter_inc = $counter+1;
if(isset($_POST['counter'])){
	$id = $_POST['id'];
}



mysqli_query($con,"UPDATE improvementsbuildingsclasses SET mode = '$mode_data' WHERE improvementsBuildingsClassesID = '$id'");	

$array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length,"mode_data"=>$mode_data);

echo json_encode($array)

?>