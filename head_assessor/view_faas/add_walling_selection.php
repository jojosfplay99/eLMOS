<?php

include '../db.php';

$new_walling = $_POST['select_walling'];
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

mysqli_query($con,"INSERT INTO structural_walls(faasid,material,first_wall,second_wall,third_wall,fourth_wall) VALUES('$id','$new_walling','$f1','$f2','$f3','$f4')");

echo $id;


?>