<?php

include '../db.php';

$select_floor = $_POST['select_floor_finish'];
$id = $_POST['id'];

if(isset($_POST['1f'])){
    $f1 = "YES";
}
else{
    $f1 = "NO";
}

if(isset($_POST['2f'])){
    $f2  = "YES";
}
else{
    $f2  = "NO";
}

if(isset($_POST['3f'])){
    $f3 = "YES";
}
else{
    $f3 = "NO";
}

if(isset($_POST['4f'])){
    $f4 = "YES";
}
else{
    $f4 = "NO";
}


mysqli_query($con,"INSERT INTO structural_floor(faasid,material,first_floor,second_floor,third_floor,fourth_floor) VALUES('$id','$select_floor','$f1','$f2','$f3','$f4')");




?>