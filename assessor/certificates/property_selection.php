<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from propertydb_rpt order by id  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from propertydb_rpt where ownername like '%".$search."%' OR tdno like '%".$search."%' OR pin like '%".$search."%' limit 30");
	}

	$data = array();

	$prefix = mysqli_query($con,"SELECT * FROM prefix_data");
	while($prefix_row = mysqli_fetch_array($prefix)){		
		$prefix_municipality = $prefix_row['prefix_municipality'];
		$prefix_province = $prefix_row['prefix_province'];
	}
	
	while ($row = mysqli_fetch_array($fetchData)) {
		$id = $row['id'];
		$propertylocation = $row['propertylocation'];
		$splitted_data = explode("," ,$propertylocation);
		
		$trimmed_array = array_map('trim', $splitted_data);		
		$key = array_search($prefix_municipality, $trimmed_array);
		$municipality = $trimmed_array[$key];
		$b = $key - 1;
		$s = $key - 2;
		$b = abs($b);
		$s = abs($s);
		$barangay = $trimmed_array[$b];		
		$counted = count($trimmed_array);
		if($counted == '3' || $counted == '2' ){
			$sitio = "";
		}
		else{
			$sitio = $trimmed_array[$s];
		}		
		
			
		$query2 = mysqli_query($con, "SELECT SUM(per_sqm) as per_sqm, SUM(marketvalue) as marketvalue, SUM(assessedvalue) as assessval FROM propertydb2_rpt WHERE propertyid = '$id'");
		while($row3 = mysqli_fetch_array($query2)){
			$assessval = $row3['assessval'];
			$per_sqm = $row3['per_sqm'];
			$marketvalue = $row3['marketvalue'];
		}
		
		


	    $data[] = array(
			"id"=>$row['id'], 
			"text"=>$row['ownername']."| TDNO:".$row['tdno'],
			"arp"=>$row['arp'], 
			"pin"=>$row['pin'], 
			"tdno"=>$row['tdno'], 
			"assessval"=>$assessval, 		
			"ownername"=>$row['ownername'], 
			"owneraddress"=>$row['address'],			
			"province"=>$prefix_province,
			"prefix_municipality" => $prefix_municipality,
			"propertylocation"=> $propertylocation,
			"municipality"=> $municipality,
			"barangay"=> $barangay,		
			"sitio"=> $sitio,	
			"per_sqm" => $per_sqm,
			"marketvalue" => $marketvalue,
		);

		
	}


echo json_encode($data);




?>
