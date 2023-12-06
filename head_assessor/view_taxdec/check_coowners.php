<?php
include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM co_owners WHERE propertyid = '$id'");
if(mysqli_num_rows($query) == 0){
    $array[] = array(
        "count"=> mysqli_num_rows($query),
        "ownername"=> "",
        "tel"=> "",
        "tin"=> "",
        "address"=> "",
    );
}else{
    while($row = mysqli_fetch_array($query)){
        $array[] = array(
            "count"=> mysqli_num_rows($query),
            "ownername"=> $row['coowner'],
            "tel"=> $row['tel'],
            "tin"=> $row['tin'],
            "address"=> $row['address'],
        );
    }
}


echo json_encode($array);
?>