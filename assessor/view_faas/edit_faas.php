<?php
include '../db.php';

$faasid = $_POST['faasid'];
$propertyid = $_POST['propertyid'];
$transaction_code = $_POST['transaction_code'];
$status = $_POST['status'];
$date_created = $_POST['date_created'];
$pin = $_POST['pin'];
$tdno = $_POST['tdno'];
$arp = $_POST['arp'];
$oct = $_POST['oct'];
$surveyno = $_POST['surveyno'];
$dated = $_POST['dated'];
$lotno = $_POST['lotno'];
$blkno = $_POST['blkno'];
$cad_lotno = $_POST['cad_lotno'];
$ownername = $_POST['ownername'];
$ownertin = $_POST['ownertin'];
$ownertel = $_POST['ownertel'];
$owneraddress = $_POST['owneraddress'];
$admin = $_POST['admin'];
$admintin = $_POST['admintin'];
$admintel = $_POST['admintel'];
$adminaddress = $_POST['adminaddress'];
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
$memoranda = $_POST['memoranda'];
$annotation = $_POST['annotation'];
$prevtd = $_POST['prevtd'];
$prevarp = $_POST['prevarp'];
$prevpin = $_POST['prevpin'];
$preveffectivity = $_POST['preveffectivity'];
$prevownername = $_POST['prevownername'];
$prevassval = $_POST['prevassval'];
$land_ownername = $_POST['land_ownername'];
$land_tdno = $_POST['land_tdno'];
$land_area = $_POST['land_area'];
$land_oct = $_POST['land_oct'];
$land_surveyno = $_POST['land_surveyno'];
$land_blkno = $_POST['land_blkno'];
$land_lotno = $_POST['land_lotno'];


mysqli_query($con,"UPDATE propertyfaasdb SET pin = '$pin',arp = '$arp',tdno = '$tdno',status = '$status',oct = '$oct',survey_no = '$surveyno',dated = '$dated',lotno = '$lotno',blk = '$blkno',cad_lotno = '$cad_lotno',ownername = '$ownername',owneraddress = '$owneraddress',tel = '$ownertel',tin = '$ownertin',admin = '$admin',adminaddress = '$adminaddress',admintel = '$admintel',admintin = '$admintin',propertylocation = '$propertylocation',north = '$north',south = '$south',east = '$east',west = '$west',propertykind = '$propertykind',effectivity = '$effectivity',previousowner = '$prevownername', preveffectivity = '$preveffectivity',prevtd = '$prevtd',prevarp = '$prevarp',prevpin = '$prevpin',prevasval = '$prevassval',memoranda = '$memoranda',annotation = '$annotation', date_created = '$date_created',taxable = '$taxable',land_owner = '$land_ownername',land_tdnum = '$land_tdno',land_area = '$land_area',land_oct = '$land_oct',land_surveyno = '$land_surveyno',land_lotno = '$land_lotno',land_blkno = '$land_blkno',transaction_code = '$transaction_code' WHERE id = '$faasid'") or die(mysqli_error($con));

?>