<?php
include '../db.php';
$search2 = $_POST['searchTerm2'];
$propertykind = $_POST['searchTerm3'];

if($propertykind == 'LAND'){
	if(!isset($_POST['searchTerm'])){        
		$fetchData = mysqli_query($con,"select * from landsubclasses where general_class LIKE '".$search2."' order by landSubclassesID  limit 10");
	}else{        
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from landsubclasses where general_class LIKE '".$search2."' AND description like '%".$search."%' limit 30");
	}
	
	if(mysqli_num_rows($fetchData) == null){
		$data[] = array("id"=>null, "text"=>null, "value"=>null, "general_class"=>null, "mode"=>null);
	}
	else{
		while ($row = mysqli_fetch_array($fetchData)) {
			$data[] = array("id"=>$row['description'], "text"=>$row['description'] , "value"=>$row['value'] , "general_class"=>$row['general_class']);
		}
	}
} else if($propertykind == 'BUILDING'){
	if(!isset($_POST['searchTerm'])){        
		$fetchData = mysqli_query($con,"select * from improvementsbuildingsclasses where general_class LIKE '".$search2."' order by improvementsBuildingsClassesID  limit 10");
	}else{        
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from improvementsbuildingsclasses where general_class LIKE '".$search2."' AND description like '%".$search."%' limit 30");
	}
	
	if(mysqli_num_rows($fetchData) == null){
		$data[] = array("id"=>null, "text"=>null, "value"=>null, "general_class"=>null, "mode"=>null);
	}
	else{
		while ($row = mysqli_fetch_array($fetchData)) {
			$data[] = array("id"=>$row['description'], "text"=>$row['description'] , "value"=>$row['value'] , "general_class"=>$row['general_class'], );
		}
	}
}else{
	if(!isset($_POST['searchTerm'])){        
		$fetchData = mysqli_query($con,"select * from machineriesclasses where general_class LIKE '".$search2."' order by machineriesClassesID  limit 10");
	}else{        
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from machineriesclasses where general_class LIKE '".$search2."' AND description like '%".$search."%' limit 30");
	}
	
	if(mysqli_num_rows($fetchData) == null){
		$data[] = array("id"=>null, "text"=>null, "value"=>null, "general_class"=>null, "mode"=>null);
	}
	else{
		while ($row = mysqli_fetch_array($fetchData)) {
			$data[] = array("id"=>$row['description'], "text"=>$row['description'] , "value"=>$row['value'] , "general_class"=>$row['general_class'], );
		}
	}
}

	

	


echo json_encode($data);
?>
