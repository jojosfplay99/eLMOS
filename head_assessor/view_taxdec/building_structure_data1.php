<?php
include '../db.php';
$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM structural_roof WHERE faasid = '$id'");
if(mysqli_num_rows($query) == 0){
    $array = array(
        "count" => mysqli_num_rows($query),
        "roof_material" => " ",
    );
}else{
    while($row = mysqli_fetch_array($query)){
        $array[] = array(
            "count" => mysqli_num_rows($query),
            "roof_material" => $row['material'],
        );
    }
}

    

    echo json_encode($array);


?>