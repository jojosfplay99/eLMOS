<?php

include '../db.php';

$idata = $_POST['id'];
$cookies = $_POST['cookies'];
$count = count($idata);



$data1 = mysqli_query($con,"SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'lmos' AND TABLE_NAME = 'propertydb_rpt'");
while($row1 = mysqli_fetch_array($data1)){
    $next_id = $row1['AUTO_INCREMENT'];
}


$query = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE id ='$idata[0]'");
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

mysqli_query($con,"INSERT INTO propertydb_rpt(tdno,pin,arp,ownername,address,ownertin,ownertel,admin,adminaddress,admintin,admintel,propertylocation,oct,surveyno,cct,lotno,dated,blkno,north,south,east,west,propertykind, storey,description,taxable,exempt,dateapproved,effectivity,prevtd,prevpin,prevarp,preveffectivity,prev_propertyid,prev_clerkid,prevassval,prevowner,prev_date_created,memoranda,status,clerkid,idle,annotation,transaction_code,date_created,land_owner,land_oct,land_surveyno,land_lotno,land_blkno,land_tdno,land_area) VALUES('$tdno','$pin','$arp','$ownername','$address','$ownertin','$ownertel','$admin','$adminaddress','$admintin','$admintel','$propertylocation','$oct','$surveyno','$cct','$lotno','$dated','$blkno','$north','$south','$east','$west','$propertykind', '$storey', '$description', '$taxable', '$exempt', '$dateapproved', '$effectivity', '$tdno', '$prevpin', '$prevarp', '$preveffectivity', '$prev_propertyid', '$prev_clerkid', '$prevassval', '$prevowner', '$prev_date_created', '$memoranda', 'PENDING ACTIVE', '$clerkid', '$idle', '$annotation', '$transaction_code', '$date_created', '$land_owner', '$land_oct', '$land_surveyno', '$land_lotno', '$land_blkno', '$land_tdno', '$land_area')") or die(mysqli_error($con));



for ($i=0; $i < $count; $i++) { 
	$query2 = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE propertyid = '$idata[$i]' ");
	if(mysqli_num_rows($query2) == 0){
		echo "DB3";
	}
	else{
		while ($row2 = mysqli_fetch_array($query2)) {             
			$propertyid = mysqli_escape_string($con,$next_id);
			$tdno = mysqli_escape_string($con,$row2['tdno']);
			$floor_item = mysqli_escape_string($con,$row2['floor_item']);
			$classification = mysqli_escape_string($con,$row2['classification']);
			$sub_classification = mysqli_escape_string($con,$row2['sub_classification']);
			$area = mysqli_escape_string($con,$row2['area']);
			$area_mode = mysqli_escape_string($con,$row2['area_mode']);
			$per_sqm = mysqli_escape_string($con,$row2['per_sqm']);
			$basic_value = mysqli_escape_string($con,$row2['basic_value']);
			$depreciated_level = mysqli_escape_string($con,$row2['depreciated_level']);
			$depreciated_value = mysqli_escape_string($con,$row2['depreciated_value']);
			$adjustment_factor = mysqli_escape_string($con,$row2['adjustment_factor']);
			$marketvalue = mysqli_escape_string($con,$row2['marketvalue']);
			$adjustment_level = mysqli_escape_string($con,$row2['adjustment_level']);
			$actualuse = mysqli_escape_string($con,$row2['actualuse']);
			$assessedlevel = mysqli_escape_string($con,$row2['assessedlevel']);
			$assessedvalue = mysqli_escape_string($con,$row2['assessedvalue']);
			$status = mysqli_escape_string($con,$row2['status']);
			$clerkid = mysqli_escape_string($con,$row2['clerkid']);
				
			mysqli_query($con,"INSERT INTO propertydb2_rpt(propertyid,tdno,floor_item,classification,sub_classification,area,area_mode,per_sqm,basic_value,depreciated_level,depreciated_value,adjustment_factor,marketvalue,adjustment_level,actualuse,assessedlevel,assessedvalue,status,clerkid) VALUES('$idata[$i]','$tdno','$floor_item','$classification','$sub_classification','$area','$area_mode','$per_sqm','$basic_value','$depreciated_level','$depreciated_value','$adjustment_factor','$marketvalue','$adjustment_level','$actualuse','$assessedlevel','$assessedvalue','PENDING ACTIVE','$clerkid')");        
		}
	}
    

    /*

	$query3 = mysqli_query($con,"SELECT * FROM propertydb3_rpt WHERE propertyid = '$idata[$i]' ");
	if(mysqli_num_rows($query3) == 0){
	
	}
	else{
		while($row3 = mysqli_fetch_array($query3)){
	        $classification2 = $row3 ['classification'];        
	        $actualuse2 = $row3['actualuse'];
	        $nooftrees2 = $row3['nooftrees'];
	        $marketvalue2 = $row3['marketvalue'];        
	        $assessedlevel2 = $row3['assessedlevel'];
	        $adjustment_level2 = $row3['adjustment_level'];
	        $assessedvalue2 = $row3['assessedvalue'];    
	        //mysqli_query($con,"INSERT INTO propertydb3_rpt(propertyid,tdno,classification,nooftrees,marketvalue,actualuse,assessedlevel,adjustment_level,assessedvalue,status,clerkid) VALUES('$next_id','$tdno (FOR EDIT)','$classification2','$nooftrees2','$marketvalue2','$actualuse2','$assessedlevel2','$adjustment_level2','$assessedvalue2','PENDING ACTIVE','$cookies')");

	        echo $row3['id']." HERE <br>";
	    }	
	}
	*/
    
/*
mysqli_query($con,"UPDATE propertydb_rpt SET status = 'CANCELLED' WHERE id = '$idata[$i]' ");
mysqli_query($con,"UPDATE propertydb2_rpt SET status = 'CANCELLED' WHERE propertyid = '$idata[$i]'");
mysqli_query($con,"UPDATE propertydb3_rpt SET status = 'CANCELLED' WHERE propertyid = '$idata[$i]'");
*/


}







?>