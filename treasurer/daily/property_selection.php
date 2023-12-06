<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from ngas order by ngasid  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from ngas where ngascode like '%".$search."%' OR naturecol like '%".$search."%' limit 30");
	}
	
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
		
	    $data[] = array(
			"id"=>$row['naturecol'], 
			"text"=>$row['ngascode']." - ".$row['naturecol'],
			"ngascode" => $row['ngascode'],
			"amount" => $row['amount'],					
		);		
	}


echo json_encode($data);




?>
