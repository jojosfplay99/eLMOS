<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from barangays order by id  limit 5");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from barangays where barangay like '%".$search."%' limit 100");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['id'], "text"=>$row['barangay']."-".$row['code'] , "barangay"=>$row['barangay'] , "code"=>$row['code'] );
	}


echo json_encode($data);
?>
