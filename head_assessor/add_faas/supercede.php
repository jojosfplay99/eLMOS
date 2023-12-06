<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from propertydb_rpt order by id  limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from propertydb_rpt where ownername like '%".$search."%' OR tdno like '%".$search."%' OR pin like '%".$search."%' limit 30");
	}

	$prefix = mysqli_query($con,"SELECT * FROM prefix_data");
	while($prefix_row = mysqli_fetch_array($prefix)){		
		$prefix_municipality = $prefix_row['prefix_municipality'];
		$prefix_province = $prefix_row['prefix_province'];
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
        $query2 = mysqli_query($con,"SELECT SUM(assessedvalue) as total_assval FROM propertydb2_rpt WHERE propertyid = '$row[id]'");
        while($row2 = mysqli_fetch_array($query2)){
            $total_assval = $row2['total_assval'];
        }
        $row2 = mysqli_fetch_array($query2);
	    $data[] = array(
			"id"=>$row['id'], 
			"text"=>$row['ownername']."| TDNO:".$row['tdno'],
            "supercede_td" => $row['tdno'],
            "supercede_arp" => $row['arp'],
            "supercede_pin" => $row['pin'],
            "supercede_effectivity" => $row['effectivity'],
            "supercede_date_created" => $row['date_created'],
		);

		
	}


echo json_encode($data);




?>
