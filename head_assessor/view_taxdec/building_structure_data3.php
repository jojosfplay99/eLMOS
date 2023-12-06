<?php
include '../db.php';
$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM structural_walls WHERE faasid = '$id'");
if(mysqli_num_rows($query) == 0){
    $array[] = array(
        "count" => mysqli_num_rows($query),
        "wall_material" => " ",
        "f1" => " ",
        "f2" => " ",
        "f3" => " ",
        "f4" => " &emsp;",
    );
}
else{
    while($row = mysqli_fetch_array($query)){
        $first_wall = $row['first_wall'];
        $second_wall = $row['second_wall'];
        $third_wall = $row['third_wall'];
        $fourth_wall = $row['fourth_wall'];
        if($first_wall == 'YES'){
            $first_wall = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        else{
            $first_wall = "";
        }
        if($second_wall == 'YES'){
            $second_wall = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        else{
            $second_wall = "";
        }
        if($third_wall == 'YES'){
            $third_wall = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        else{
            $third_wall = "";
        }
        if($fourth_wall == 'YES'){
            $fourth_wall = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        else{
            $fourth_wall = "";
        }
        $array[] = array(
            "count" => mysqli_num_rows($query),
            "wall_material" => $row['material'],
            "f1" => $first_wall,
            "f2" => $second_wall,
            "f3" => $third_wall,
            "f4" => $fourth_wall,
        );
    }
    
}
    

echo json_encode($array);


?>