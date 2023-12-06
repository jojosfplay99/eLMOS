<?php
include '../db.php';

$clerkid = mysqli_escape_string($con,$_POST['clerkid']);
$date_created = mysqli_escape_string($con,$_POST['date_created']);
$transaction_code = mysqli_escape_string($con,$_POST['transaction_code']);
$status = mysqli_escape_string($con,$_POST['status']);
$tdno = mysqli_escape_string($con,$_POST['tdno']);
$pin = mysqli_escape_string($con,$_POST['pin']);
$arp = mysqli_escape_string($con,$_POST['arp']);
$ownername = mysqli_escape_string($con,$_POST['ownername']);
$ownertin = mysqli_escape_string($con,$_POST['ownertin']);
$ownertel = mysqli_escape_string($con,$_POST['ownertel']);
$owneraddress = mysqli_escape_string($con,$_POST['owneraddress']);
$admin = mysqli_escape_string($con,$_POST['admin']);
$admintin = mysqli_escape_string($con,$_POST['admintin']);
$admintel = mysqli_escape_string($con,$_POST['admintel']);
$adminaddress = mysqli_escape_string($con,$_POST['adminaddress']);
$sitio = mysqli_escape_string($con,$_POST['sitio']);
$barangay = mysqli_escape_string($con,$_POST['barangay']);
$municipality = mysqli_escape_string($con,$_POST['municipality']);
$province = mysqli_escape_string($con,$_POST['province']);
$propertylocation = $sitio.",".$barangay.",".$municipality.",".$province;
$oct = mysqli_escape_string($con,$_POST['oct']);
$surveyno = mysqli_escape_string($con,$_POST['surveyno']);
$cct = mysqli_escape_string($con,$_POST['cct']);
$lotno = mysqli_escape_string($con,$_POST['lotno']);
$dated = mysqli_escape_string($con,$_POST['dated']);
$blkno = mysqli_escape_string($con,$_POST['blkno']);
$north = mysqli_escape_string($con,$_POST['north']);
$south = mysqli_escape_string($con,$_POST['south']);
$east = mysqli_escape_string($con,$_POST['east']);
$west = mysqli_escape_string($con,$_POST['west']);
$propertykind = mysqli_escape_string($con,$_POST['propertykind']);
$storey = mysqli_escape_string($con,$_POST['storey']);
$specify = mysqli_escape_string($con,$_POST['specify']);
$description = mysqli_escape_string($con,$_POST['description']);
$taxable = mysqli_escape_string($con,$_POST['taxable']);
$exempt = mysqli_escape_string($con,$_POST['exempt']);
$dateapproved = mysqli_escape_string($con,$_POST['dateapproved']);
$effectivity = mysqli_escape_string($con,$_POST['effectivity']);
$prevowner = mysqli_escape_string($con,$_POST['prevowner']);
$prevtd = mysqli_escape_string($con,$_POST['prevtd']);
$prevassval = mysqli_escape_string($con,$_POST['prevassval']);
$memoranda = mysqli_escape_string($con,$_POST['memoranda']);
$annotation = mysqli_escape_string($con,$_POST['annotation']);


$land_owner = mysqli_escape_string($con,$_POST['land_owner']);
$land_oct = mysqli_escape_string($con,$_POST['land_oct']);
$land_surveyno = mysqli_escape_string($con,$_POST['land_surveyno']);
$land_lotno = mysqli_escape_string($con,$_POST['land_lotno']);
$land_blkno = mysqli_escape_string($con,$_POST['land_blkno']);
$land_tdno = mysqli_escape_string($con,$_POST['land_tdno']);
$land_area = mysqli_escape_string($con,$_POST['land_area']);

$supercede_td = mysqli_escape_string($con,$_POST['supercede_td']);
$supercede_arp = mysqli_escape_string($con,$_POST['supercede_arp']);
$supercede_pin = mysqli_escape_string($con,$_POST['supercede_pin']);
$supercede_effectivity = mysqli_escape_string($con,$_POST['supercede_effectivity']);
$supercede_date_created = mysqli_escape_string($con,$_POST['supercede_date_created']);



$query = mysqli_query($con,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'lmos' AND TABLE_NAME = 'propertydb_rpt'");
while($row = mysqli_fetch_array($query)){
    $next_id = $row['AUTO_INCREMENT'];
    mysqli_query($con,"INSERT INTO propertydb_rpt (tdno, pin, arp, ownername, address, ownertin, ownertel, admin, adminaddress, admintin, admintel, propertylocation, oct, surveyno, cct, lotno, dated, blkno, north, south, east, west, propertykind, storey, description, taxable, exempt, dateapproved, effectivity, prevtd, prevpin,prevarp,preveffectivity,prev_propertyid,prev_clerkid,prevassval,prevowner,prev_date_created,memoranda,status,clerkid,idle,annotation,transaction_code,date_created,land_owner,land_oct,land_surveyno,land_lotno,land_blkno,land_tdno,land_area) VALUES ('$tdno', '$pin', '$arp', '$ownername', '$owneraddress', '$ownertin', '$ownertel', '$admin', '$adminaddress', '$admintin', '$admintel', '$propertylocation', '$oct', '$surveyno', '$cct', '$lotno', '$dated', '$blkno', '$north', '$south', '$east', '$west', '$propertykind', '$storey', '$description', '$taxable', '$exempt', '$dateapproved', '$effectivity', '$prevtd', '$supercede_pin', '$supercede_arp', '$supercede_effectivity',null, null, '$prevassval', '$land_owner', '$supercede_date_created', '$memoranda', '$status', '$clerkid', null, '$annotation', '$transaction_code', '$date_created', '$land_owner', '$land_oct', '$land_surveyno', '$land_lotno', '$land_blkno', '$land_tdno', '$land_area')") or die(mysqli_error($con));
}

echo $next_id;



?>