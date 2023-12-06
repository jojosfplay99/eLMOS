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
    $propertykind = $row1['propertykind'];
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




$array = array(
    "propertykind" => $proper,
    "marketvalue" => $marketvalue,
    "assessedvalue" => $assessedvalue,
    "classification" => $class1,
);
echo json_encode($array);



?>