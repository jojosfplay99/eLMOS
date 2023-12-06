<?php
include '../db.php';
$search2 = $_POST['searchTerm2'];

	if(!isset($_POST['searchTerm'])){        
		$fetchData = mysqli_query($con,"select * from landactualuses where general_class = '".$search2."' order by landActualUsesID  limit 10");
	}else{        
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from landactualuses where general_class = '".$search2."' AND description like '%".$search."%' limit 30");
	}
		
	

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['description'], "text"=>$row['description'] , "value"=>$row['value'] , "general_class"=>$row['general_class'], "value"=>$row['value']);
	}


echo json_encode($data);
?>
