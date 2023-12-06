<?php

include '../db.php';
$id = $_POST['id'];



$query = mysqli_query($con,"SELECT * FROM propertyfaasdb WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
    $pin = $row['pin'];
    $arp = $row['arp'];
    $tdno = $row['tdno'];
    $status = $row['status'];
    $oct = $row['oct'];
    $survey_no = $row['survey_no'];
    $dated = $row['dated'];
    $lotno = $row['lotno'];
    $blk = $row['blk'];
    $cad_lotno = $row['cad_lotno'];
    $ownername = $row['ownername'];
    $owneraddress = $row['owneraddress'];
    $tel = $row['tel'];
    $tin = $row['tin'];
    $admin = $row['admin'];
    $adminaddress = $row['adminaddress'];
    $admintel = $row['admintel'];
    $admintin = $row['admintin'];
    $propertylocation = $row['propertylocation'];
    $north = $row['north'];
    $south = $row['south'];
    $east = $row['east'];
    $west = $row['west'];
    $propertykind = $row['propertykind'];
    $effectivity = $row['effectivity'];
    $previousowner = $row['previousowner'];
    $date_generated = $row['date_generated'];
    $propertyid = $row['propertyid'];
    $preveffectivity = $row['preveffectivity'];
    $prevtd = $row['prevtd'];
    $prevarp = $row['prevarp'];
    $prevpin = $row['prevpin'];
    $prevasval = $row['prevasval'];
    $memoranda = $row['memoranda'];
    $annotation = $row['annotation'];
    $clerkid = $row['clerkid'];
    $date_created = $row['date_created'];
    $taxable = $row['taxable'];
    if($taxable == 'YES'){
        $exempt = "NO";
    }
    else{
        $exempt = "YES";
    }
    $land_owner = $row['land_owner'];
    $land_tdnum = $row['land_tdnum'];
    $land_area = $row['land_area'];
    $land_oct = $row['land_oct'];
    $land_surveyno = $row['land_surveyno'];
    $land_lotno = $row['land_lotno'];
    $land_blkno = $row['land_blkno'];
    $transaction_code = $row['transaction_code'];
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
    "pin" => $pin,
    "arp" => $arp,
    "tdno" => $tdno,
    "status" => $status,
    "oct" => $oct,
    "survey_no" => $survey_no,
    "dated" => $dated,
    "lotno" => $lotno,
    "blk" => $blk,
    "cad_lotno" => $cad_lotno,
    "ownername" => $ownername,
    "owneraddress" => $owneraddress,
    "tel" => $tel,
    "tin" => $tin,
    "admin" => $admin,
    "adminaddress" => $adminaddress,
    "admintel" => $admintel,
    "admintin" => $admintin,
    "propertylocation" => $propertylocation,
    "north" => $north,
    "south" => $south,
    "east" => $east,
    "west" => $west,
    "propertykind" => $propertykind,
    "effectivity" => $effectivity,
    "previousowner" => $previousowner,
    "date_generated" => $date_generated,
    "propertyid" => $propertyid,
    "preveffectivity" => $preveffectivity,
    "prevtd" => $prevtd,
    "prevarp" => $prevarp,
    "prevpin" => $prevpin,
    "prevasval" => $prevasval,
    "memoranda" => $memoranda,
    "annotation" => $annotation,
    "clerkid" => $clerkid,
    "date_created" => $date_created,
    "taxable" => $taxable,
    "exempt" => $exempt,
    "land_owner" => $land_owner,
    "land_tdnum" => $land_tdnum,
    "land_area" => $land_area,
    "land_oct" => $land_oct,
    "land_surveyno" => $land_surveyno,
    "land_lotno" => $land_lotno,
    "land_blkno" => $land_blkno,
    "transaction_code" => $transaction_code,
    "prefix_municipality" => $prefix_municipality,
    "prefix_province" => $prefix_province,
    "head_name" => $head_name,
);

echo json_encode($array);

?>