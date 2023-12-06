<?php
include '../db.php';

$value = $_GET['value'];

$query = mysqli_query($con,"SELECT * FROM ngas WHERE naturecol LIKE '%".$value."%' ");
while($row = mysqli_fetch_array($query)){
    $naturecol = $row['naturecol'];
    $id = $row['ngasid'];
}

$array = array(
    "naturecol" => $naturecol,
    "id " => $id ,
);

echo json_encode($array);

?>