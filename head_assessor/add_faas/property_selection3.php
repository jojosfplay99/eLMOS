<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from propertydb_rpt WHERE propertykind LIKE 'BUILDING' order by id  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from propertydb_rpt where ownername like '%".$search."%' OR tdno like '%".$search."%' OR pin like '%".$search."%' AND propertykind LIKE 'BUILDING' limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
		$propertylocation = $row['propertylocation'];
		$splitted_data = explode("," ,$propertylocation);
		
		$trimmed_array = array_map('trim', $splitted_data);		
		$key = array_search("CEBU", $trimmed_array);
		$province = $trimmed_array[$key];
		$counted = count($trimmed_array);
		if($counted > 3){	
			$sitio_key = $key - 3;		
			$sitio = $trimmed_array[$sitio_key];			
		}else{
			$sitio = "";
		}

		$prevtd = $row['prevtd'];
		$query = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE tdno = '$prevtd'");
		if(mysqli_num_rows($query) == 0){
			$prev_arp = "";
			$prev_pin = "";
			$prev_effectivity = "";
			$prev_ownername = "";			
			$prev_assval = "";
		}
		else{
			while($row2 = mysqli_fetch_array($query)){
				$id = $row2['id'];
				$query2 = mysqli_query($con, "SELECT SUM(assessedvalue) as assessval FROM propertydb2_rpt WHERE propertyid = '$id'");
				while($row3 = mysqli_fetch_array($query2)){
					$prev_assval = $row3['assessedvalue'];
				}
				$prev_arp = $row2['arp'];
				$prev_pin = $row2['pin'];
				$prev_effectivity = $row2['effectivity'];
				$prev_ownername = $row2['ownername'];				
			}
		}
		

	    $data[] = array(
			"id"=>$row['id'], 
			"text"=>$row['ownername']."| TDNO:".$row['tdno'],
			"arp"=>$row['arp'], 
			"pin"=>$row['pin'], 
			"tdno"=>$row['tdno'], 
			"status"=>$row['status'], 
			"oct"=>$row['oct'], 
			"surveyno"=>$row['surveyno'], 
			"dated"=>$row['dated'], 
			"lotno"=>$row['lotno'], 
			"blkno"=>$row['blkno'],
			"ownername"=>$row['ownername'], 
			"owneraddress"=>$row['address'],
			"ownertel"=>$row['ownertel'],
			"ownertin"=>$row['ownertin'],
			"admin"=>$row['admin'],			
			"adminaddress"=>$row['adminaddress'],
			"admintel"=>$row['admintel'],
			"admintin"=>$row['admintin'],
			"province"=>$splitted_data[$key],			
			"municipality"=>$splitted_data[$key-1],
			"barangay"=>$splitted_data[$key-2],		
			"sitio"=>$sitio,
			"count"=>$counted,	
			"north"=>$row['north'],
			"south"=>$row['south'],
			"east"=>$row['east'],
			"west"=>$row['west'],
			"propertykind"=>$row['propertykind'],
			"effectivity"=>$row['effectivity'],
			"taxable"=>$row['taxable'],
			"exempt"=>$row['exempt'],			
			"status"=>$row['status'],

			"prevtd" => $prevtd,
			"prev_arp" => $prev_arp,
			"prev_pin" => $prev_pin,
			"prev_effectivity" => $prev_effectivity,
			"prev_ownername" => $prev_ownername,
			"prev_assval" => $prev_assval,
		);

		
	}


echo json_encode($data);
?>
