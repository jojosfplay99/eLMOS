<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from propertydb_rpt WHERE propertykind LIKE 'LAND' order by id  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from propertydb_rpt where ownername like '%".$search."%' OR tdno like '%".$search."%' OR pin like '%".$search."%' AND propertykind LIKE 'LAND' limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {		
		

		$id = $row['id'];			
		$query2 = mysqli_query($con,"SELECT SUM(per_sqm) as per_sqm FROM propertydb2_rpt WHERE propertyid = '$id'");
		if(mysqli_num_rows($query2) == 0){
			$per_sqm = "";			
		}
		else{
			while($row3 = mysqli_fetch_array($query2)){
				$per_sqm = $row3['per_sqm'];							
			}
		}

	    $data[] = array(
			"id"=>$row['id'], 
			"text"=>$row['ownername']."| TDNO:".$row['tdno'],
			"tdno"=>$row['tdno'],  
			"oct"=>$row['oct'], 
			"surveyno"=>$row['surveyno'], 
			"dated"=>$row['dated'], 
			"lotno"=>$row['lotno'], 
			"blkno"=>$row['blkno'],
			"ownername"=>$row['ownername'],
			"per_sqm"=>$per_sqm, 					
		);

		
	}


echo json_encode($data);
?>
