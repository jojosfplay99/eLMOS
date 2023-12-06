<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from propertydb_rpt order by id  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from propertydb_rpt where ownername like '%".$search."%' OR tdno like '%".$search."%' OR pin like '%".$search."%' limit 30");
	}
	
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
		$id = $row['id'];
		$tdno = $row['tdno'];
		$ownername = $row['ownername'];
		

		$query = mysqli_query($con,"SELECT SUM(assessedvalue) as assessedvalue FROM propertydb2_rpt WHERE propertyid = '$id'");
		while($row2 = mysqli_fetch_array($query)){
			$assessedvalue = $row2['assessedvalue'];
		}
	    $data[] = array(
			"id"=>$row['id'], 
			"text"=>$row['ownername'] ." | ".$row['tdno'],
			"tdno" => $row['tdno'],
			"ownername" => $row['ownername'],
			"assessedvalue" => $assessedvalue,			
		);		
	}


echo json_encode($data);




?>
