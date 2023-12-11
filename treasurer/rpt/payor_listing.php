<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from payor_listing order by id  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from payor_listing where payor_name like '%".$search."%' limit 30");
	}
	
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
		
		

		
	    $data[] = array(
			"id"=>$row['payor_name'], 
			"payor_name"=>$row['payor_name'],			
		);		
	}


echo json_encode($data);




?>
