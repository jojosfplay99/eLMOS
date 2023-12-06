<?php
include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT SUM(marketvalue) as marketvalue, SUM(assessedvalue) as assessedvalue FROM propertydb2_rpt WHERE propertyid = '$id'");
while($row = mysqli_fetch_array($query)){
    $marketvalue = $row['marketvalue'];
    $assessedvalue = $row['assessedvalue'];
}

$query1 = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE id = '$id'");
while($row1 = mysqli_fetch_array($query1)){
    $tdno = $row1['tdno'];
    $propertykind = $row1['propertykind'];
    $ownername = $row1['ownername'];
    $propertylocation = $row1['propertylocation'];
}

if($propertykind == 'LAND'){
    $proper = "LAND";    
}else if($propertykind == 'BUILDING'){
    $proper = "BLDG";   
}else if($propertykind == 'MACHINERY'){
    $proper = "MACH";    
}

$query2 = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE propertyid = '$id'");
while($row2 = mysqli_fetch_array($query2)){
    $sub_classification = $row2['sub_classification'];
    
    if($propertykind == 'LAND'){
        $query3 = mysqli_query($con,"SELECT * FROM landsubclasses WHERE description LIKE '$sub_classification'");
        while($row3 = mysqli_fetch_array($query3)){
            $gen_class = $row3['general_class'];
        }
    }else if($propertykind == 'BUILDING'){
        $query3 = mysqli_query($con,"SELECT * FROM improvementsbuildingsclasses WHERE description LIKE '$sub_classification'");
        while($row3 = mysqli_fetch_array($query3)){
            $gen_class = $row3['general_class'];
        }
    }else if($propertykind == 'MACHINERY'){
        $query3 = mysqli_query($con,"SELECT * FROM machineriesclasses WHERE description LIKE '$sub_classification'");
        while($row3 = mysqli_fetch_array($query3)){
            $gen_class = $row3['general_class'];
        }
    }
    else{
        
    }
    if($gen_class == "R"){
        $class = "RES";
    }else if($gen_class == "A"){
        $class = "AGRI";
    }else if($gen_class == "C"){
        $class = "COM";
    }else if($gen_class == "I"){
        $class = "IND";
    }else if($gen_class == "M"){
        $class = "COM";
    }else if($gen_class == 'S'){
        $class = "SPEC";
    }else{
        $class = substr("$sub_classification", 0, 4);
    }    
    $class1[] = $class;
}

$classification = $proper."-".implode("/", $class1);
$assessedvalue_data = $assessedvalue * .20;
$basic_sef = $assessedvalue_data / 2;


echo $classification;
$dated = date('Y-m-d');
$year = date('Y-m');

mysqli_query($con,"INSERT INTO assessment_notice (propertyid, ownername, tdno, propertylocation, classification, year, assessedvalue, basic_tax, sef_tax, adjustment_percentage, adjustment_value, total_data, date_created) values( '$id', '$ownername', '$tdno', '$propertylocation','$classification' ,'$year', '$assessedvalue','$basic_sef', '$basic_sef', '20', '$assessedvalue_data', '$assessedvalue_data', '$dated')") or die(mysqli_error($con));




?>