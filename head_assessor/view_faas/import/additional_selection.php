<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from materials_additional order by id  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from materials_additional where material limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	
	    $data[] = array(
			"id"=>$row['name'], 
			"text"=>$row['name'],						
		);

		
	}


echo json_encode($data);
?>
