<?php
include '../db.php';
	if(!isset($_POST['searchTerm'])){        
		$fetchData = mysqli_query($con,"select * from landsubclasses order by landSubclassesID  limit 10");
	}else{        
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from landsubclasses where description like '%".$search."%' limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['landSubclassesID'], "text"=>$row['description'] , "value"=>$row['value'] );
	}


echo json_encode($data);
?>
