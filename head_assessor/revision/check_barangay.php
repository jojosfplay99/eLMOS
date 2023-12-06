<?php

include '../db.php';

$query = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE status = 'ACTIVE'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $tdno = $row['tdno'];
    $propertylocation = $row['propertylocation'];
    $location = explode(",", $propertylocation);
    $data_trim = array_map('trim', $location);
    $search = array_search("ALCOY", $data_trim);
    if($search === false){
        $propertylocation = "INCORRECT FORMAT";                
    }
    else{
        $position = $search - 1;
        $propertylocation = $location[$position];
    }    
    $array[] = array("id"=>$id, "tdno"=>$tdno, "propertylocation"=>$propertylocation);
}

echo json_encode($array)

?>