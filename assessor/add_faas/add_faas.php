<?php

include '../db.php';

$select_propertyid = $_POST['select_propertyid'];
$clerkid = $_POST['clerkid'];
$transaction_code = $_POST['transaction_code'];
$arp = $_POST['arp'];
$date_generated = date('Y-m-d');
$pin = $_POST['pin'];
$tdno = $_POST['tdno'];
$status = $_POST['status'];
$oct = $_POST['oct'];
$surveyno = $_POST['surveyno'];
$dated = $_POST['dated'];
$lotno = $_POST['lotno'];
$blkno = $_POST['blkno'];
$cad_lotno = $_POST['cad_lotno'];
$ownername = $_POST['ownername'];
$owneraddress = $_POST['owneraddress'];
$ownertel = $_POST['ownertel'];
$ownertin = $_POST['ownertin'];
$admin = $_POST['admin'];
$adminaddress = $_POST['adminaddress'];
$admintel = $_POST['admintel'];
$admintin = $_POST['admintin'];
$sitio = $_POST['sitio'];
$barangay = $_POST['barangay'];
$municipality = $_POST['municipality'];
$province = $_POST['province'];
$propertylocation = $sitio.",".$barangay.",".$municipality.",".$province;
$north = $_POST['north'];
$south = $_POST['south'];
$east = $_POST['east'];
$west = $_POST['west'];
$propertykind = $_POST['propertykind'];
$effectivity = $_POST['effectivity'];
$taxable = $_POST['taxable'];
$exempt = $_POST['exempt'];
$prevtd = $_POST['prevtd'];
$prevarp = $_POST['prevarp'];
$prevpin = $_POST['prevpin'];
$preveffectivity = $_POST['preveffectivity'];
$prevownername = $_POST['prevownername'];
$prevassval = $_POST['prevassval'];
$land_owner = $_POST['land_ownername'];
$land_oct = $_POST['land_oct'];
$land_surveyno = $_POST['land_surveyno'];
$land_lotno = $_POST['land_lotno'];
$land_area = $_POST['land_area'];
$land_blkno = $_POST['land_blkno'];
$land_tdno = $_POST['land_tdno'];

$memoranda = $_POST['memoranda'];
$annotation = $_POST['annotation'];

$query = mysqli_query($con,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'lmos' AND TABLE_NAME = 'propertyfaasdb'");
while($row = mysqli_fetch_array($query)){
    $next_id = $row['AUTO_INCREMENT'];
    
    mysqli_query($con,"INSERT INTO propertyfaasdb (pin, arp, tdno, status, oct, survey_no, dated, lotno, blk, cad_lotno, ownername, owneraddress, tel, tin, admin, adminaddress, admintel, admintin, propertylocation, north, south, east, west, propertykind, effectivity, previousowner, date_generated, propertyid, preveffectivity, prevtd, prevarp, prevpin, prevasval, memoranda, annotation, clerkid, date_created, taxable, land_owner, land_tdnum, land_area, land_oct, land_surveyno, land_lotno, land_blkno, transaction_code) 
    values ('$pin','$arp','$tdno','$status','$oct','$surveyno','$dated','$lotno','$blkno','$cad_lotno','$ownername','$owneraddress','$ownertel','$ownertin','$admin','$adminaddress','$admintel','$admintin','$propertylocation','$north','$south','$east','$west','$propertykind','$effectivity','$prevownername','$date_generated','$select_propertyid','$preveffectivity','$prevtd','$prevarp','$prevpin','$prevassval','$memoranda','$annotation','$clerkid','$date_generated','$taxable','$land_owner','$land_tdno','$land_area','$land_oct','$land_surveyno','$land_lotno','$land_blkno','$transaction_code')") or die(mysqli_error($con));
    

    $query2 = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE propertyid = '$select_propertyid'");
    if(mysqli_num_rows($query2) != 0){
        while($row = mysqli_fetch_array($query2)){
            $propertyid = $row['propertyid'];
            $tdno = $row['tdno'];
            $classification = $row['classification'];
            $sub_classification = $row['sub_classification'];
            $area = $row['area'];
            $area_mode = $row['area_mode'];
            $per_sqm = $row['per_sqm'];
            $basic_value = $row['basic_value'];
            $marketvalue = $row['marketvalue'];
            $adjustment_level = $row['adjustment_level'];
            $actualuse = $row['actualuse'];
            $assessedlevel = $row['assessedlevel'];
            $assessedvalue = $row['assessedvalue'];
            $status = $row['status'];
            $clerkid = $row['clerkid'];

            mysqli_query($con,"INSERT INTO propertyfaasdb2(faasid,propertyid,tdno,classification,sub_classification,area,area_mode,per_sqm,basic_value,adjustment_level,marketvalue,actualuse,assessedlevel,assessedvalue) VALUES('$next_id','$propertyid','$tdno','$classification','$sub_classification','$area','$area_mode','$per_sqm','$basic_value','$adjustment_level','$marketvalue','$actualuse','$assessedlevel','$assessedvalue')");
        }
    }
    
}


echo $next_id;



?>