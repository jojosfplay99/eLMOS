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
		$effectivity = mysqli_escape_string($con,$row['effectivity']);
		$dateapproved = mysqli_escape_string($con,$row['dateapproved']);
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
    
    $query2 = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE propertyid = '$id'");
    while ($row2 = mysqli_fetch_array($query2)) {             
        $classification = mysqli_escape_string($con,$row2 ['classification']);
        $sub_classification = mysqli_escape_string($con,$row2['sub_classification']);
        $actualuse = mysqli_escape_string($con,$row2['actualuse']);
        $tdno = mysqli_escape_string($con,$row2['tdno']);
        $area = $row2['area'];
        $marketvalue = $row2['marketvalue'];
        $adjustment_level = $row2['adjustment_level'];
        $assessedlevel = $row2['assessedlevel'];
        $assessedvalue = $row2['assessedvalue']; 
        $cookies = $row2['clerkid'];
            
        mysqli_query($con,"INSERT INTO propertydb2_rpt(propertyid,tdno,classification,sub_classification,area,marketvalue,adjustment_level,actualuse,assessedlevel,assessedvalue,status,clerkid) VALUES('$next_id','$tdno','$classification','$sub_classification','$area','$marketvalue','$adjustment_level','$actualuse','$assessedlevel','$assessedvalue','PENDING ACTIVE','$cookies')");        
    }

    $query3 = mysqli_query($con,"SELECT * FROM propertydb3_rpt WHERE propertyid = '$id'");
    while ($row3 = mysqli_fetch_array($query3)) {             
        $classification = mysqli_escape_string($con,$row3['classification']);
        $actualuse = mysqli_escape_string($con,$row3['actualuse']);
        $tdno = mysqli_escape_string($con,$row3['tdno']);
        $nooftrees = $row3['nooftrees'];
        $marketvalue = $row3['marketvalue'];
        $assessedlevel = $row3['assessedlevel'];
        $adjustment_level = $row3['adjustment_level'];
        $assessedvalue = $row3['assessedvalue']; 
        $cookies = $row3['clerkid'];
        mysqli_query($con,"INSERT INTO propertydb3_rpt(propertyid,tdno,classification,nooftrees,marketvalue,actualuse,assessedlevel,adjustment_level,assessedvalue,status,clerkid) VALUES('$next_id','$tdno','$classification','$nooftrees','$marketvalue','$actualuse','$assessedlevel','$adjustment_level','$assessedvalue','PENDING ACTIVE','$cookies')");        
    }

    mysqli_query($con,"UPDATE propertydb_rpt SET status = 'CANCELLED' WHERE id = '$id' ");

    mysqli_query($con,"UPDATE propertydb2_rpt SET status = 'CANCELLED' WHERE propertyid = '$id'");

    mysqli_query($con,"UPDATE propertydb3_rpt SET status = 'CANCELLED' WHERE propertyid = '$id'");



}

$array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length,"clerkid"=>$clerkid);

echo json_encode($array);

?>