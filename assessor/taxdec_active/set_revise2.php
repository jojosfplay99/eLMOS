<?php

include "../db.php";
$clerkid = $_POST['clerkid'];
$counter = $_POST['counter'];
$total_length = $_POST['total_length'];
$counter_inc = $counter+1;
if(isset($_POST['counter'])){
	$id = $_POST['id'];
}


$date_created = date("Y-m-d");

$data1 = mysqli_query($con,"SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'lmos' AND TABLE_NAME = 'propertydb_rpt'");
while($row1 = mysqli_fetch_array($data1)){
    $next_id = $row1['AUTO_INCREMENT'];
    
    $query = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE id ='$id'");
	while ($row = mysqli_fetch_array($query)) {        
		$tdno = mysqli_escape_string($con,$row['tdno']);
		$pin = mysqli_escape_string($con,$row['pin']);
		$arp = mysqli_escape_string($con,$row['arp']);
		$ownername = mysqli_escape_string($con,$row['ownername']);
		$address = mysqli_escape_string($con,$row['address']);
		$ownertin = mysqli_escape_string($con,$row['ownertin']);
		$ownertel = mysqli_escape_string($con,$row['ownertel']);
		$admin = mysqli_escape_string($con,$row['admin']);
		$adminaddress = mysqli_escape_string($con,$row['adminaddress']);
		$admintin = mysqli_escape_string($con,$row['admintin']);
		$admintel = mysqli_escape_string($con,$row['admintel']);
		$propertylocation = mysqli_escape_string($con,$row['propertylocation']);
		$oct = mysqli_escape_string($con,$row['oct']);
		$surveyno = mysqli_escape_string($con,$row['surveyno']);
		$cct = mysqli_escape_string($con,$row['cct']);
		$lotno = mysqli_escape_string($con,$row['lotno']);
		$dated = mysqli_escape_string($con,$row['dated']);
		$blkno = mysqli_escape_string($con,$row['blkno']);
		$north = mysqli_escape_string($con,$row['north']);
		$south = mysqli_escape_string($con,$row['south']);
		$east = mysqli_escape_string($con,$row['east']);
		$west = mysqli_escape_string($con,$row['west']);
		$propertykind = mysqli_escape_string($con,$row['propertykind']); 
		$storey = mysqli_escape_string($con,$row['storey']); 
		$description = mysqli_escape_string($con,$row['description']); 
		$taxable = mysqli_escape_string($con,$row['taxable']); 
		$exempt = mysqli_escape_string($con,$row['exempt']); 
		$dateapproved = mysqli_escape_string($con,$row['dateapproved']); 
		$effectivity = mysqli_escape_string($con,$row['effectivity']); 
		$prevtd = mysqli_escape_string($con,$row['prevtd']); 
		$prevpin = mysqli_escape_string($con,$row['prevpin']); 
		$prevarp = mysqli_escape_string($con,$row['prevarp']); 
		$preveffectivity = mysqli_escape_string($con,$row['preveffectivity']); 
		$prev_propertyid = mysqli_escape_string($con,$row['prev_propertyid']); 
		$prev_clerkid = mysqli_escape_string($con,$row['prev_clerkid']); 
		$prevassval = mysqli_escape_string($con,$row['prevassval']); 
		$prevowner = mysqli_escape_string($con,$row['prevowner']); 
		$prev_date_created = mysqli_escape_string($con,$row['prev_date_created']); 
		$memoranda = mysqli_escape_string($con,$row['memoranda']); 
		$status = mysqli_escape_string($con,$row['status']); 
		$clerkid = mysqli_escape_string($con,$row['clerkid']); 
		$idle = mysqli_escape_string($con,$row['idle']); 
		$annotation = mysqli_escape_string($con,$row['annotation']); 
		$transaction_code = mysqli_escape_string($con,$row['transaction_code']); 
		$date_created = mysqli_escape_string($con,$row['date_created']); 
		$land_owner = mysqli_escape_string($con,$row['land_owner']); 
		$land_oct = mysqli_escape_string($con,$row['land_oct']); 
		$land_surveyno = mysqli_escape_string($con,$row['land_surveyno']); 
		$land_lotno = mysqli_escape_string($con,$row['land_lotno']); 
		$land_blkno = mysqli_escape_string($con,$row['land_blkno']); 
		$land_tdno = mysqli_escape_string($con,$row['land_tdno']); 
		$land_area = mysqli_escape_string($con,$row['land_area']);	
	}

    mysqli_query($con,"INSERT INTO propertydb_rpt(tdno,pin,arp,ownername,address,ownertin,ownertel,admin,adminaddress,admintin,admintel,propertylocation,oct,surveyno,cct,lotno,dated,blkno,north,south,east,west,propertykind, storey,description,taxable,exempt,dateapproved,effectivity,prevtd,prevpin,prevarp,preveffectivity,prev_propertyid,prev_clerkid,prevassval,prevowner,prev_date_created,memoranda,status,clerkid,idle,annotation,transaction_code,date_created,land_owner,land_oct,land_surveyno,land_lotno,land_blkno,land_tdno,land_area) VALUES('$tdno','$pin','$arp','$ownername','$address','$ownertin','$ownertel','$admin','$adminaddress','$admintin','$admintel','$propertylocation','$oct','$surveyno','$cct','$lotno','$dated','$blkno','$north','$south','$east','$west','$propertykind', '$storey', '$description', '$taxable', '$exempt', '$dateapproved', '$effectivity', '$prevtd', '$prevpin', '$prevarp', '$preveffectivity', '$prev_propertyid', '$prev_clerkid', '$prevassval', '$prevowner', '$prev_date_created', '$memoranda', 'FOR REVISION', '$clerkid', '$idle', '$annotation', '$transaction_code', '$date_created', '$land_owner', '$land_oct', '$land_surveyno', '$land_lotno', '$land_blkno', '$land_tdno', '$land_area')") or die(mysqli_error($con));
    
    $query2 = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE propertyid = '$id'");
    while ($row2 = mysqli_fetch_array($query2)) {  
        $id1 = $row2['id'];
        $propertyid = mysqli_escape_string($con,$next_id);
		$tdno = mysqli_escape_string($con,$row2['tdno']);
		$floor_item = mysqli_escape_string($con,$row2['floor_item']);
		$classification = mysqli_escape_string($con,$row2['classification']);	
		$sub_classification = mysqli_escape_string($con,$row2['sub_classification']);
        $depreciated_level = mysqli_escape_string($con,$row2['depreciated_level']);
        $area_mode = mysqli_escape_string($con,$row2['area_mode']);
        $per_sqm = mysqli_escape_string($con,$row2['per_sqm']);
        $adjustment_level = mysqli_escape_string($con,$row2['adjustment_level']);
        $adjustment_factor = mysqli_escape_string($con,$row2['adjustment_factor']);
        $actualuse = mysqli_escape_string($con,$row2['actualuse']);
        $assessedlevel = mysqli_escape_string($con,$row2['assessedlevel']);
        $area = mysqli_escape_string($con,$row2['area']);            
        if($propertykind == 'LAND'){
            $fetchData = mysqli_query($con,"select * from landsubclasses where description LIKE '".$sub_classification."' order by landSubclassesID");            
        }
        else if($propertykind == 'BUILDING'){
            $fetchData = mysqli_query($con,"select * from improvementsbuildingsclasses where description LIKE '".$sub_classification."' order by improvementsBuildingsClassesID");            
        }
        else if($propertykind == 'MACHINERY'){
            $fetchData = mysqli_query($con,"select * from machineriesclasses where description LIKE '".$sub_classification."' order by machineriesClassesID");
        }
        if(mysqli_num_rows($fetchData) == 0){            
            $basic_value = mysqli_escape_string($con,$row2['basic_value']);                        
            $depreciated_value = mysqli_escape_string($con,$row2['depreciated_value']);
            $marketvalue = mysqli_escape_string($con,$row2['marketvalue']);                        
            $assessedvalue = mysqli_escape_string($con,$row2['assessedvalue']);            
        }
        else{
            while($row_fetch = mysqli_fetch_array($fetchData)){
                $unit_val = $row_fetch['value'];
            }
            $basic_value = $area * $unit_val;            
            $percentage_level1 = $depreciated_level / 100;
            $depreciated_value = $basic_value * $percentage_level1;
            $base_level = $basic_value - $depreciated_value;            
            $percentage_level = $adjustment_level / 100;
            $marketvalue = $base_level * $percentage_level;
            $percentage_level2 = $assessedlevel / 100;
            $assessedvalue = $marketvalue * $percentage_level2;
        }

        
        $status = mysqli_escape_string($con,$row2['status']);
        $clerkid = mysqli_escape_string($con,$clerkid);
		mysqli_query($con,"INSERT INTO propertydb2_rpt(propertyid,tdno,floor_item,classification,sub_classification,area,area_mode,per_sqm,basic_value,depreciated_level,depreciated_value,adjustment_factor,marketvalue,adjustment_level,actualuse,assessedlevel,assessedvalue,status,clerkid) VALUES('$next_id','$tdno','$floor_item','$classification','$sub_classification','$area','$area_mode','$per_sqm','$basic_value','$depreciated_level','$depreciated_value','$adjustment_factor','$marketvalue','$adjustment_level','$actualuse','$assessedlevel','$assessedvalue','FOR REVISION','$clerkid')");        
        //mysqli_query($con,"UPDATE propertydb2_rpt SET basic_value = '$basic_value',depreciated_value = '$depreciated_value',marketvalue = '$marketvalue',assessedvalue = '$assessedvalue' WHERE id = '$id1'") or die(mysqli_error($con));
    }

}

mysqli_query($con,"UPDATE propertydb_rpt SET status = 'CANCELLED' WHERE id = '$id'") or die(mysqli_error($con));
mysqli_query($con,"UPDATE propertydb2_rpt SET status = 'CANCELLED' WHERE propertyid = '$id'");

$array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length,"clerkid"=>$clerkid);

echo json_encode($array);

?>