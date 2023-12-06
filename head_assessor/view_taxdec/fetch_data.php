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
    $prevarp = $row['prevarp'];
    $prevpin = $row['prevpin'];
    $prevassval = $row['prevassval'];
    $prevowner = $row['prevowner'];
    $memoranda = $row['memoranda'];
    $status = $row['status'];
    $clerkid = $row['clerkid'];
    $idle = $row['idle'];
    $annotation = $row['annotation'];
    $date_created = $row['date_created'];
    $transaction_code = $row['transaction_code'];
    $preveffectivity = $row['preveffectivity'];
    $prev_clerkid = $row['prev_clerkid'];
    $prev_propertyid = $row['prev_propertyid'];
    $prev_date_created = $row['prev_date_created'];
    $land_owner = $row['land_owner'];
    $land_oct = $row['land_oct'];
    $land_surveyno = $row['land_surveyno'];
    $land_lotno = $row['land_lotno'];
    $land_blkno = $row['land_blkno'];
    $land_tdno = $row['land_tdno'];
    $land_area = $row['land_area'];
}

$query2 = mysqli_query($con,"SELECT * FROM prefix_data");
while($row2 = mysqli_fetch_array($query2)){
    $prefix_municipality = $row2['prefix_municipality'];
    $prefix_province = $row2['prefix_province'];   
}

$query3 = mysqli_query($con,"SELECT * FROM user WHERE designation = '2'");
while($row3 = mysqli_fetch_array($query3)){
    $head_name = $row3['name'];
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
    "head_name" => $head_name,
    "prevarp" => $prevarp,
    "prevpin" => $prevpin,
    "preveffectivity" => $preveffectivity,
    "land_owner" => $land_owner,
    "land_oct" => $land_oct,
    "land_surveyno" => $land_surveyno,
    "land_lotno" => $land_lotno,
    "land_blkno" => $land_blkno,
    "land_tdno" => $land_tdno,
    "land_area" => $land_area,
    "prev_date_created" => $prev_date_created,
);

echo json_encode($array);

?>