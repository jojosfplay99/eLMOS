<?php
include 'assessor/db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"SELECT * FROM `designation_table` WHERE `id` NOT LIKE '1' AND `id` NOT LIKE '2' AND `id` NOT LIKE '9' LIMIT 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from designation_table where designation like '%".$search."%' AND SELECT * FROM `designation_table` WHERE `id` NOT LIKE '1' AND `id` NOT LIKE '2' AND `id` NOT LIKE '9'limit 30");
	}

	$data = array();

	
	while ($row = mysqli_fetch_array($fetchData)) {

	    $data[] = array(
			"id"=>$row['id'], 
			"text"=>$row['designation'],			
		);

		
	}


echo json_encode($data);




?>
