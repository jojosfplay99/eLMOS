<?php

include '../db.php';
$id = $_POST['id'];



$query = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $tdno = $row['tdno'];
    $pin = $row['pin'];
    $arp = $row['arp'];
    $ownername = $row['ownername'];
    $address = $row['address'];
    $ownertin = $row['ownertin'];
    $ownertel = $row['ownertel'];
    $admin = $row['admin'];
    $adminaddress = $row['adminaddress'];
    $admintin = $row['admintin'];
    $admintel = $row['admintel'];
    $propertylocation = $row['propertylocation'];
    $oct = $row['oct'];
    $surveyno = $row['surveyno'];
    $cct = $row['cct'];
    $lotno = $row['lotno'];
    $dated = $row['dated'];
    $blkno = $row['blkno'];
    $north = $row['north'];
    $south = $row['south'];
    $east = $row['east'];
    $west = $row['west'];
    $propertykind = $row['propertykind'];
    $storey = $row['storey'];
    $description = $row['description'];
    $taxable = $row['taxable'];
    $exempt = $row['exempt'];
    $dateapproved = $row['dateapproved'];
    $effectivity = $row['effectivity'];
    $prevtd = $row['prevtd'];
    $prevassval = $row['prevassval'];
    $prevowner = $row['prevowner'];
    $memoranda = $row['memoranda'];
    $status = $row['status'];
    $clerkid = $row['clerkid'];
    $idle = $row['idle'];
    $annotation = $row['annotation'];
    $date_created = $row['date_created'];
    $transaction_code = $row['transaction_code'];
}

$query2 = mysqli_query($con,"SELECT * FROM prefix_data");
while($row2 = mysqli_fetch_array($query2)){
    $prefix_municipality = $row2['prefix_municipality'];
    $prefix_province = $row2['prefix_province'];   
}


$array = array(
    "id" => $id,
    "tdno" => $tdno,
    "pin" => $pin,
    "arp" => $arp,
    "ownername" => $ownername,
    "address" => $address,
    "ownertin" => $ownertin,
    "ownertel" => $ownertel,
    "admin" => $admin,
    "adminaddress" => $adminaddress,
    "admintin" => $admintin,
    "admintel" => $admintel,
    "propertylocation" => $propertylocation,
    "oct" => $oct,
    "surveyno" => $surveyno,
    "cct" => $cct,
    "lotno" => $lotno,
    "dated" => $dated,
    "blkno" => $blkno,
    "north" => $north,
    "south" => $south,
    "east" => $east,
    "west" => $west,
    "propertykind" => $propertykind,
    "storey" => $storey,
    "description" => $description,
    "taxable" => $taxable,
    "exempt" => $exempt,
    "dateapproved" => $dateapproved,
    "effectivity" => $effectivity,
    "prevtd" => $prevtd,
    "prevassval" => $prevassval,
    "prevowner" => $prevowner,
    "memoranda" => $memoranda,
    "status" => $status,
    "clerkid" => $clerkid,
    "idle" => $idle,
    "annotation" => $annotation,
    "date_created" => $date_created,
    "transaction_code" => $transaction_code,
    "prefix_municipality" => $prefix_municipality,
    "prefix_province" => $prefix_province,
);

echo json_encode($array);

?>