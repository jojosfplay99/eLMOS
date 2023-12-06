<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from landclasses order by landClassesID  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from landclasses where description like '%".$search."%' limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['code'], "text"=>$row['description'] , "value"=>$row['value'], "classification_name"=>$row['description'] );
	}


echo json_encode($data);
?>
