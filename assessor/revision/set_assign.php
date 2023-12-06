<?php

include '../db.php';

$query = mysqli_query($con,"SELECT * FROM prefix_data");
while($row = mysqli_fetch_array($query)){
    $prefix = $row['prefix_tdno'];
}
$barangay_code = $_POST['barangay_code'];
$counter = $_POST['counter'];
$total_length = $_POST['total_length'];
$counter_inc = $counter+1;
if(isset($_POST['counter'])){
	$id = $_POST['id'];
}


$starting = $_POST['starting'];
$starting_tdno = str_pad($starting,5,"0",STR_PAD_LEFT); 
$next_start = $starting + 1;

$arp_prefix = date('y')."-".$barangay_code."-".$starting_tdno;

mysqli_query($con,"UPDATE propertydb_rpt SET status = 'PENDING ACTIVE', tdno = '$prefix-$barangay_code-$starting_tdno', arp = '$arp_prefix' WHERE id = '$id'");
mysqli_query($con,"UPDATE propertydb2_rpt SET status = 'PENDING ACTIVE', tdno = '$prefix-$barangay_code-$starting_tdno'  WHERE propertyid = '$id'");


$array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length,"starting_tdno"=>$starting_tdno,"next_tdno"=>$next_start,"barangay_code"=>$barangay_code);

echo json_encode($array);

?>