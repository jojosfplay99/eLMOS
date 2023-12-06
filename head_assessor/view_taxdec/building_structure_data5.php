<?php
include '../db.php';
$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM structural_add WHERE faasid = '$id'");
if(mysqli_num_rows($query) == 0){
    $array[] = array(
        "count" => mysqli_num_rows($query),
        "add_material" => " ",
        "f1" => " ",
        "f2" => " ",
        "f3" => " ",
        "f4" => " &emsp;",
    );
}else{
    while($row = mysqli_fetch_array($query)){
        $first_floor = $row['first_floor'];
        $second_floor = $row['second_floor'];
        $third_floor = $row['third_floor'];
        $fourth_floor = $row['fourth_floor'];
        if($first_floor == 'YES'){
            $first_floor = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        else{
            $first_floor = "";
        }
        if($second_floor == 'YES'){
            $second_floor = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        else{
            $second_floor = "";
        }
        if($third_floor == 'YES'){
            $third_floor = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        else{
            $third_floor = "";
        }
        if($fourth_floor == 'YES'){
            $fourth_floor = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        else{
            $fourth_floor = "";
        }
        $array[] = array(
            "count" => mysqli_num_rows($query),
            "add_material" => $row['material'],
            "f1" => $first_floor,
            "f2" => $second_floor,
            "f3" => $third_floor,
            "f4" => $fourth_floor,
        );
    }
    
}
echo json_encode($array);
?>