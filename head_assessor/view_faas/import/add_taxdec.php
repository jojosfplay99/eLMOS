<?php

include '../db.php';

$query = mysqli_query($con,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'lmos' AND TABLE_NAME = 'propertydb_rpt'");
while($row = mysqli_fetch_array($query)){
    $next_id = $row['AUTO_INCREMENT'];
    $query2 = mysqli_query($con,"SELECT id FROM propertydb_rpt WHERE id = '$next_id'");
    if(mysqli_num_rows($query2) == 0){
        $clerkid = mysqli_escape_string($con,$_POST['clerkid']);
        $date_created = mysqli_escape_string($con,$_POST['date_created']);
        $transaction_code = mysqli_escape_string($con,$_POST['transaction_code']);
        $tdno = mysqli_escape_string($con,$_POST['tdno']);
        $pin = mysqli_escape_string($con,$_POST['pin']);
        $arp = mysqli_escape_string($con,$_POST['arp']);
        $ownername = mysqli_escape_string($con,$_POST['ownername']);
        $owneraddress = mysqli_escape_string($con,$_POST['owneraddress']);
        $ownertin = mysqli_escape_string($con,$_POST['ownertin']);
        $owner_telephone = mysqli_escape_string($con,$_POST['owner_telephone']);
        $admin = mysqli_escape_string($con,$_POST['admin']);
        $admin_address = mysqli_escape_string($con,$_POST['admin_address']);
        $admintin = mysqli_escape_string($con,$_POST['admintin']);
        $admin_telephone = mysqli_escape_string($con,$_POST['admin_telephone']);
        $sitio = mysqli_escape_string($con,$_POST['sitio']);
        $barangay = mysqli_escape_string($con,$_POST['barangay']);
        $municipality = mysqli_escape_string($con,$_POST['municipality']);
        $province = mysqli_escape_string($con,$_POST['province']);
        $propertylocation = $sitio.",".$barangay.",".$municipality.",".$province;
        $oct = mysqli_escape_string($con,$_POST['oct']);
        $survey_no = mysqli_escape_string($con,$_POST['survey_no']);
        $cct = mysqli_escape_string($con,$_POST['cct']);
        $lot_no = mysqli_escape_string($con,$_POST['lot_no']);
        $dated = mysqli_escape_string($con,$_POST['dated']);
        $blk_no = mysqli_escape_string($con,$_POST['blk_no']);
        $north = mysqli_escape_string($con,$_POST['north']);
        $south = mysqli_escape_string($con,$_POST['south']);
        $east = mysqli_escape_string($con,$_POST['east']);
        $west = mysqli_escape_string($con,$_POST['west']);
        $propertykind = mysqli_escape_string($con,$_POST['propertykind']);
        $storeys = mysqli_escape_string($con,$_POST['storeys']);
        $brief_desc = mysqli_escape_string($con,$_POST['brief_desc']);
        $taxable = mysqli_escape_string($con,$_POST['taxable']);
        $exempt = mysqli_escape_string($con,$_POST['exempt']);
        $date_approved = mysqli_escape_string($con,$_POST['date_approved']);
        $effectivity = mysqli_escape_string($con,$_POST['effectivity']);
        $previous_owner = mysqli_escape_string($con,$_POST['previous_owner']);
        $previoustd = mysqli_escape_string($con,$_POST['previoustd']);
        $previous_assval = mysqli_escape_string($con,$_POST['previous_assval']);
        $memoranda = mysqli_escape_string($con,$_POST['memoranda']);
        $annotation = mysqli_escape_string($con,$_POST['annotation']);
        $status = mysqli_escape_string($con,$_POST['status']);
        $idle = null;

        mysqli_query($con,"INSERT INTO propertydb_rpt (tdno, pin, arp, ownername, address, ownertin, ownertel, admin, adminaddress, admintin, admintel, propertylocation, oct, surveyno, cct, lotno, dated, blkno, north, south, east, west, propertykind, storey, description, taxable, exempt, dateapproved, effectivity, prevtd, prevassval, prevowner, memoranda, status, clerkid, idle, annotation, date_created, transaction_code) VALUES('$tdno', '$pin', '$arp', '$ownername', '$owneraddress', '$ownertin', '$owner_telephone', '$admin', '$admin_address','$admintin', '$admin_telephone', '$propertylocation', '$oct', '$survey_no', '$cct', '$lot_no', '$dated', '$blk_no', '$north', '$south', '$east', '$west', '$propertykind', '$storeys', '$brief_desc', '$taxable', '$exempt', '$date_approved', '$effectivity', '$previoustd', '$previous_assval', '$previous_owner', '$memoranda', '$status', '$clerkid', '$idle', '$annotation', '$date_created', '$transaction_code')") or die(mysqli_error($con));
        $code = 0;
    }
    else{
        $code = 1;
    }
}

//$encoded = urlencode( base64_encode( $next_id ) );



$array = array('next_id' => $next_id, 'code' => $code);

echo json_encode($array);


?>